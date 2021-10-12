<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PostController;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\PostPrescription;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\RecommendDoctor;
use App\Models\Prescription;
use App\Http\Controllers\RateController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchBlog;
use App\Http\Controllers\SearchPost;
use App\Http\Controllers\PostMessage;
use App\Models\Blog;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\SpecialistDoctor;
use App\Models\MedPost;
use App\Models\S_Post;
use App\Models\S_Prescription;
use App\Models\PostStatus;

Route::get('/c',function(){

    return view('chatbot');
});
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);



Route::post('user', [UserAuth::class, 'userLogin']);
Route::post('reg', [UserAuth::class, 'userRegister']);
Route::post('home/post_blog', [BlogController::class, 'store']);
Route::post('home/post_issue', [PostController::class, 'post']);

Route::view('home', 'home');
Route::view('register', 'register');
Route::view('hospitalad', 'hospitalad');
Route::get('/hospitalad', function () {
    if(session()->has('hospital_admin')){
        $se = session('hospital_admin');
        $info = DB::select("select * from hospital_admins where email='$se'");
       // $doc_data = DB::select("select * from doc_schedules inner join doctors on doc_schedules.email=doctors.email");
       $doc_data =  DB::select("select * from doctors");
       return view('hospitalad', compact('info', 'doc_data'));
    
    }else{
        return view('login');
    }

    
});
Route::get('/home', function () {
    if(session()->has('doctor')){
        $se = session('doctor');
        $info = DB::select("select * from doctors where email='$se'");
        return view('home', ['info' => $info]);
    } else if(session()->has('patient')){
        $se = session('patient');
        $info = DB::select("select * from patients where email='$se'");
        //echo $info;
        $blogs = Blog::all()->sortByDesc('created_at');

        return view('home', ['info' => $info, 'blogs' => $blogs]);
    } else if(session()->has('specialist')){
     return redirect('/s_home');
        /*
        $se = session('specialist');
        $post_info = DB::select("select * from med_posts order by id desc");
        
        $doc_info = DB::select("select * from specialist_doctors where email='$se'");
        $patient_info = DB::select("select * from patients");
        $user_id = SpecialistDoctor::where('email', $se)->first()->id;
        $users = SpecialistDoctor::find($user_id);


        return view('s_home', ['users' => $users, 'post_info' => $post_info, 'doc_info'=>$doc_info, 'patient_info' => $patient_info]);
   */
    } else if(session()->has('admin')){
        $se = session('admin');
        $info = DB::select("select * from admins where email='$se'");

        return view('home', ['info' => $info]);
    } else if(session()->has('hospital_admin')){
        $se = session('hospital_admin');
        $info = DB::select("select * from hospital_admins where email='$se'");

        return view('hospitalad', ['info' => $info]);
    }else{
        return view('login');
    }

    
})->name('home');

Route::get('/doctorhome', function () {
    if(session()->has('doctor')){
        $se = session('doctor');
        $post_info = DB::select("select * from med_posts order by id desc");
        
        $doc_info = DB::select("select * from doctors where email='$se'");
        $patient_info = DB::select("select * from patients");
        $user_id = Doctor::where('email', $se)->first()->id;
        $users = Doctor::find($user_id);


        return view('doctorhome', ['users' => $users, 'post_info' => $post_info, 'doc_info'=>$doc_info, 'patient_info' => $patient_info]);
    
    }else{
        return view('login');
    }

    
})->name('doctorhome');
Route::get('/register', function(){
    return view('register');
})->name('dochome');

Route::get('/', function () {
    

    return view('welcome');
});
Route::get('/login', function(){
    return view('login');
});
Route::get('/logout', function () {
    if(session()->has('doctor')){
        session()->pull('doctor');
    } if(session()->has('patient')){
        session()->pull('patient');
    } if(session()->has('specialist')){
        session()->pull('specialist');
    } if(session()->has('admin')){
        session()->pull('admin');
    }if(session()->has('hospital_admin')){
        session()->pull('hospital_admin');
    }

    return view('login');
});
Route::get('schedule', [ScheduleController::class, 'index']);
Route::get('schedule/{id}', [ScheduleController::class, 'destroy']);
Route::get('create_schedule/', [ScheduleController::class, 'create']);
Route::post('add_schedule', [ScheduleController::class, 'store']);
Route::get('home/consultation', function(){
    $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");
    $docs = DB::select('select * from doctors');
    $rated_docs = DB::select('select * from doctors order by rating desc limit 20');
    return view('consultation',  ['info' => $info, 'docs' => $docs, "rated_docs" => $rated_docs]);
})->name('consul');

Route::get('/home/viewpost/{id}', function($id){
    $se = session('doctor');
    
    $user_id = Doctor::where('email', $se)->first()->id;
    $users = Doctor::find($user_id);

    $post_info = DB::select("select * from med_posts where id='$id'");

        $doc_info = DB::select("select * from doctors where email='$se'");
        $patient_info = DB::select("select * from patients");

    return view('viewpost',  ['users' => $users, 'post_info' => $post_info, 'doc_info' => $doc_info, 'patient_info'=>$patient_info]);
})->name('view_post');

Route::get('/home/viewpost/give/{id}', function($id){
    $se = session('doctor');
    $post_info = DB::select("select * from med_posts where id='$id'");
    $post_info = $post_info[0];
    $doc_info = DB::select("select * from doctors where email='$se'");
    $patient_info = DB::select("select * from patients");
        
    $pdf = DB::select("select pdf from med_posts where id='$id'");
   
    $pat_email =  DB::select("select patient_email from med_posts where id='$id'");
    $e = $pat_email[0]->patient_email;
    //print_r();
    $images =  DB::select("select image from med_posts where id='$id'");

    
    $patient_detail = DB::select("select * from patients where email='$e'");

    
    $pres = Prescription::all();
    $count = 0;
    foreach($pres as $p){
        if($p->post_id == $post_info->id and $p->doctor_email == $se){
            $count += 1;
        }
    }

    //echo $count;

    if($count >= 1){
        //return "<script>alert('You already gave presciption sir! :3');</script>";

        return redirect("/home/viewpost/".$id)->with('msg', "Prescription already given...");
    }

    $user_id = Doctor::where('email', $se)->first()->id;
    $users = Doctor::find($user_id);

    return view('prescription',  ['users' => $users, 'images' => $images, 'pat_email'=>$e, 'patient_detail' => $patient_detail, 'pdf' => $pdf, 'id' => $id, 'post_info' => $post_info, 'doc_info' => $doc_info, 'patient_info'=>$patient_info]);
 
})->name('give_pres');


Route::post('home/add_pres/', [PostPrescription::class, 'store_pres'])->name('add_pres');


Route::get('recommend', [RecommendDoctor::class, 'recommend'])->name('recommend_doc');


Route::get('home/followups', function(){
    
    $se = $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");

    if(session()->has('patient')){
        $se = session('patient');
        $user_id = Patient::where('email', $se)->first()->id;
       
       $users = Patient::find($user_id);
   
        $follows = DB::select("select * from follow_ups where p_email='$se'");
        $patient_info = DB::select("select * from patients where email='$se'");
        return view('followup', ['users' => $users, 'info' => $info, 'email' => $se, 'follows' => $follows, 'patient_info' => $patient_info]);
    }else{
       
        $se = session('doctor');
        $info = DB::select("select * from doctors where email='$se'");
        $user_id = Doctor::where('email', $se)->first()->id;
       $users = Doctor::find($user_id);
        $doc_info = DB::select("select * from doctors where email='$se'");
        $follows = DB::select("select * from follow_ups where d_email='$se'");
        return view('followup', ['users' => $users, 'info' => $info, 'email' => $se, 'follows' => $follows, 'doc_info' => $doc_info]);
    }
  
})->name('followups');


Route::get('doctorhome/deletenotification/{id}', function($id){
DB::delete("DELETE from notifications where id='$id'");
return redirect('doctorhome/');

   

});

Route::get('home/view_doctors', function(){
    $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");
    $docs = DB::select("select * from doctors");

    return view("view_doc_profile", ['info' => $info, 'docs' => $docs]);
})->name('view_profile');


Route::get('home/view_doctors/{id}', function($id){
    $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");
    $docs = DB::select("select * from doctors where id='$id'");

    return view("doc_profile", ['info' => $info, 'docs' => $docs]);
});

Route::get('home/view_doctors/rate/{patientid}/{doctorid}/{rate}', [RateController::class, 'rate']);

Route::get('home/blog', function(){
    $se = session('doctor');
    $info = DB::select("select * from patients");
    $docs = DB::select("select * from doctors where email='$se'");
    $user_id = Doctor::where('email', $se)->first()->id;
       $users = Doctor::find($user_id);

    return view("writeblog", ['users' => $users, 'doc_info' => $docs, 'info' => $info, 'docs' => $docs, 'doctor_email' => $se]);
})->name('blog');


Route::get('home/viewblog', function(){
    $se = session('doctor');
        $post_info = DB::select("select * from med_posts order by id desc");
        
        $doc_info = DB::select("select * from doctors where email='$se'");
        $patient_info = DB::select("select * from patients");
        $user_id = Doctor::where('email', $se)->first()->id;
        $users = Doctor::find($user_id);
        $blogs = Blog::all()->sortByDesc('created_at');


        return view('viewblog_doc', ['blogs' => $blogs, 'viewblog_doc', 'users' => $users, 'post_info' => $post_info, 'doc_info'=>$doc_info, 'patient_info' => $patient_info]);

    
})->name('view_blog');

Route::get('home/view_prescriptions', function(){
    $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");
    

    $post_info = DB::select("select * from med_posts where patient_email='$se'");

      
    $patient_info = DB::select("select * from patients where email='$se'");

    return view('view_prescriptions',  ['info' => $info, 'post_info' => $post_info, 'patient_info' => $patient_info]);
    
})->name('view_prescriptions');


/*
SMART ATTESTATION 
*/

function docbook_prescription_comparison($DoctorI, $DoctorJ)
{
	$DoctorI_len = strlen($DoctorI);
	$DoctorJ_len = strlen($DoctorJ);
	
	$distance = (int) floor ((max($DoctorI_len,$DoctorJ_len))/2)-1;
	$commons1 = commonCharacters( $DoctorI, $DoctorJ, $distance );
	$commons2 = commonCharacters( $DoctorJ, $DoctorI, $distance );
	
	if( ($commons1_len = strlen( $commons1 )) == 0) return 0;
	if( ($commons2_len = strlen( $commons2 )) == 0) return 0;

	// calculate transpositions
	$transpositions = 0;
	$upperBound = min( $commons1_len, $commons2_len );

	for( $i = 0; $i < $upperBound; $i++)
	{
		if( $commons1[$i] != $commons2[$i] ) 
		$transpositions++;
	}
	$transpositions /= 2.0;


	// return the docbook_prescription_comparison distance
	return (($upperBound/($DoctorI_len) + $upperBound/($DoctorJ_len) + ($upperBound - $transpositions)/($commons1_len)) / 3.0);
}

function commonCharacters( $DoctorI, $DoctorJ, $distance )
{
	$DoctorI_len = strlen($DoctorI);
	$DoctorJ_len = strlen($DoctorJ);
	$commonCharacters='';
	$matching=0;
  
	for($i=0;$i<$DoctorI_len;$i++)
	{
		$noMatch = True;
		for( $j= 0; $noMatch && $j < $DoctorJ_len ; $j++)
		{
			if(($DoctorJ[$j]==$DoctorI[$i]) && (abs($j-$i)<=$distance))
			{
				$noMatch = False;
				$matching++;
				$commonCharacters .= $DoctorI[$i];
			}
		}
	}
	return $commonCharacters;
}

function prefixLength( $DoctorI, $DoctorJ, $MINPREFIXLENGTH = 4 )
{
	$n = min( array( $MINPREFIXLENGTH, strlen($DoctorI), strlen($DoctorJ) ) );
    for($i = 0; $i < $n; $i++)
	{
		if( $DoctorI[$i] != $DoctorJ[$i] )
		{
			return $i;
		}
	}
	return $n;
}

function docbook_prescription_comparisonWinkler($DoctorI, $DoctorJ, $PREFIXSCALE, $threshold)
{
	$DoctorI = strtolower($DoctorI);
	$DoctorJ = strtolower($DoctorJ);
	$docbook_prescription_comparisonDistance = docbook_prescription_comparison( $DoctorI, $DoctorJ );
	$prefixLength = prefixLength( $DoctorI, $DoctorJ );
	$result = round(($docbook_prescription_comparisonDistance + ($prefixLength * $PREFIXSCALE * (1.0 - $docbook_prescription_comparisonDistance)))*100,2);
	if ($result >= $threshold)
		return $result;
	else
    return $result;
}

function convertPrescription($no, $string){
    $result = [];
    $fields = explode('#', $string);
    $names = []; $times = []; $days = []; $amount = []; $descriptions = []; 
    $names_t = []; $times_t = []; $hospitals = [];
   
    for($i = 0; $i < count($fields); $i++){
        if($i == 0){
            $names = $fields[0];
            if(strpos($names, '|')){
                $names = explode('|', $names);
    
            }
        }else if($i == 1){
            $times = $fields[1];
            if(strpos($times, '|')){
                $times = explode('|', $times);
    
            }
        }else if($i == 2){
            $days = $fields[2];
            if(strpos($days, '|')){
                $days = explode('|', $days);
    
            }
        }else if($i == 3){
            $amount = $fields[3];
            if(strpos($amount, '|')){
                $amount = explode('|', $amount);
    
            }
        }else if($i == 4){
            $descriptions = $fields[4];
            if(strpos($descriptions, '|')){
                $descriptions = explode('|', $descriptions);
    
            }
        }else if($i == 5){
            $names_t = $fields[5];
            if(strpos($names_t, '|')){
                $names_t = explode('|', $names_t);
    
            }



        }
        else if($i == 6){
            $times_t = $fields[6];
            if(strpos($times_t, '|')){
                $times_t = explode('|', $times_t);
    
            }



        }else if($i == 7){
            $hospitals = $fields[7];
            if(strpos($hospitals, '|')){
                $hospitals = explode('|', $hospitals);
    
            }



        }

      
       

    }

    
    if(is_array($names)){
        for($i = 0; $i < count($names); $i++){
            array_push($result, [$names[$i], $times[$i], $days[$i], $amount[$i], $descriptions[$i]]);
        }
    }else{
        array_push($result, [$names, $times, $days, $amount, $descriptions]);

    }

   
    

   

   // echo json_encode($result);




    
   
    return $result;
    
    

}

function convertPrescription_t($no, $string){
    $result = [];
    $fields = explode('#', $string);
    $names = []; $times = []; $days = []; $amount = []; $descriptions = []; 
    $names_t = []; $times_t = []; $hospitals = [];
   
    for($i = 0; $i < count($fields); $i++){
        
        if($i == 5){
            $names_t = $fields[5];
            if(strpos($names_t, '|')){
                $names_t = explode('|', $names_t);
    
            }



        }
        else if($i == 6){
            $times_t = $fields[6];
            if(strpos($times_t, '|')){
                $times_t = explode('|', $times_t);
    
            }



        }else if($i == 7){
            $hospitals = $fields[7];
            if(strpos($hospitals, '|')){
                $hospitals = explode('|', $hospitals);
    
            }



        }

      
       

    }

    
    

    if(is_array($names_t)){
        for($i = 0; $i < count($names_t); $i++){
            array_push($result, [$names_t[$i], $times_t[$i], $hospitals[$i]]);
        }
    }else{
        array_push($result, [$names_t, $times_t, $hospitals]);

    }
    

    array_push($result, [$fields[8], $fields[9]]);

   // echo json_encode($result);




    
   
    return $result;
    
    

}
Route::get('home/smart_attestation/{id}', function($id){
    $id_p = $id;
    $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");
    $patient_info = DB::select("select * from patients where email='$se'");

    $post_info = DB::select("select * from med_posts where id='$id'");

      
    $prescriptions = DB::select("select * from prescriptions where post_id='$id'");
    
    $pres = [];
    $pres_ids = [];
    
    $index = 0;
    foreach($prescriptions as $p){
        array_push($pres, $p->information);
        array_push($pres_ids, $p->id);

    }
    
    $p1=$pres[0]; $p2=$pres[1]; $p3=$pres[2];

    

    $detail1 = convertPrescription("1", $p1); $detail2 = convertPrescription("2", $p2); $detail3 = convertPrescription("3", $p3);
   
    $detail1_t = convertPrescription_t("1", $p1);
    $detail2_t = convertPrescription_t("2", $p2);
    $detail3_t = convertPrescription_t("3", $p3);

   //print_r($detail1);
  // print_r($detail2);

//print_r($detail3);



    

    $string = [];
    $name = [];

    $p1 = explode('#', $p1);
    $name = $p1[0];
    if(strpos($name, '|')){
        $name = explode('|', $name);
    }
    if(is_array($name)){
        $name = implode(' ', $name);
    }
   

    $index = 0;
    foreach($p1 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string, $cols);
            $index += 1;
            }
        }
        
    }

    $string = implode(' ', $string);
    //echo $string;

    $string2 =[];
    $name2 = [];
    $p2 = explode('#', $p2);
    $name2 = $p2[0];
    if(strpos($name2, '|')){
        $name2 = explode('|', $name2);
    }
    if(is_array($name2)){
        $name2 = implode(' ', $name2);
    }
    

    $index = 0;
    foreach($p2 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string2, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string2, $cols);
            $index += 1;
            }
        }
        
    }
   
    $string2 = implode(' ', $string2);
    //echo $string2;
    
    $string3 = [];
    $name3 = [];
    $p3 = explode('#', $p3);
    $name3 = $p3[0];
    if(strpos($name3, '|')){
        $name3 = explode('|', $name3);
    }
    if(is_array($name3)){
        $name3 = implode(' ', $name3);
    }
    

    $index = 0;
    foreach($p3 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string3, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string3, $cols);
            $index += 1;
            }
        }
        
    }

    $string3 = implode(' ', $string3);

   // echo $string."<br>"; echo $string2."<br>"; echo $string3."<br>";

    $p1_p2 = docbook_prescription_comparisonWinkler($string, $string2 , 0.1, 80);
    $name1_2 = docbook_prescription_comparisonWinkler($name, $name2 , 0.1, 80);

    $p1_p3 = docbook_prescription_comparisonWinkler($string, $string3 , 0.1, 80);
    $name1_3 = docbook_prescription_comparisonWinkler($name, $name3 , 0.1, 80);

    $p2_p3 = docbook_prescription_comparisonWinkler($string2, $string3, 0.1, 80);
    $name2_3 = docbook_prescription_comparisonWinkler($name2, $name3 , 0.1, 80);

    $name_high = max($name1_2, $name1_3, $name2_3);
    $recommend_specialist = "";
/*
    echo $name."<br>"; echo $name2."<br>"; echo $name3."<br>";
    echo $name1_2."<br>";
    echo $name1_3."<br>";; echo $name2_3."<br>";;
   echo $name_high;
*/
    if($name_high < 95){
        $recommend_specialist = "YES";
    }else{
        $recommend_specialist = "NO";
    }


    $result = [];

    $choose = max($p1_p2, $p1_p3, $p2_p3);
    $chosen_ids = [];
    if($choose == $p1_p2){
        array_push($chosen_ids, $pres_ids[0], $pres_ids[1]);

    }else if($choose == $p1_p3){
        array_push($chosen_ids, $pres_ids[0], $pres_ids[2]);
    }else{
        array_push($chosen_ids, $pres_ids[1], $pres_ids[2]);
    }

    //echo "<br><br><br>";
    //echo "<h3>";
    //echo $string."<br>========"; 
    //echo $string2."<br>======="; 
    //echo $string3."<br>=======";
    //echo "</h3>";
    array_push($result, "Prescription".$pres_ids[0]." and Prescription".$pres_ids[1]."=> ".$p1_p2.'%');
    array_push($result, "Prescription".$pres_ids[0]." and Prescription".$pres_ids[2]." => ".$p1_p3."%");
    array_push($result, "Prescription".$pres_ids[1]." and Prescription".$pres_ids[2]." => ".$p2_p3.'%');
    array_push($result, "Prescription chosen ::: ".implode(',', $chosen_ids));




    //echo $result;



    
   // echo $string;

   // $string = "";
   $found = PostStatus::all()->where('post_id', (int)$id);

   if(count($found) == 0){
    $post_status = "unassigned";
   }else{
    $post_status = PostStatus::all()->where('post_id', (int)$id)->first()->status;
   }
  
   

    return view('smart_attestation',  ['post_status' => $post_status, 'info' => $info, 'id_p' => $id_p, 'chosen_ids' => $chosen_ids, 'detail1_t' => $detail1_t, 'detail2_t' => $detail2_t, 'detail3_t' => $detail3_t, 'detail1' => $detail1, 'detail2' => $detail2, 'detail3' => $detail3, 'recommend' => $recommend_specialist, 'patient_info' => $patient_info,'string' => $result, 'post_info' => $post_info, 'prescriptions' => $prescriptions]);
    
})->name('smart_attestation');



Route::get('home/viewPDF/{id}/{id2}', function($id, $id2){
    $se = session('patient');
    $patient_info = DB::select("select * from patients where email='$se'");

    $post_info = DB::select("select * from med_posts where id='$id'");

      
    $prescriptions = DB::select("select * from prescriptions where post_id='$id'");
    
    $pres = [];
    $pres_ids = [];
    
    $index = 0;
    foreach($prescriptions as $p){
        array_push($pres, $p->information);
        array_push($pres_ids, $p->id);

    }
    
    $p1=$pres[0]; $p2=$pres[1]; $p3=$pres[2];

    

    $detail1 = convertPrescription("1", $p1); $detail2 = convertPrescription("2", $p2); $detail3 = convertPrescription("3", $p3);
   
    $detail1_t = convertPrescription_t("1", $p1);
    $detail2_t = convertPrescription_t("2", $p2);
    $detail3_t = convertPrescription_t("3", $p3);

   //print_r($detail1);
  // print_r($detail2);

//print_r($detail3);



    

    $string = [];
    $name = [];

    $p1 = explode('#', $p1);
    $name = $p1[0];
    if(strpos($name, '|')){
        $name = explode('|', $name);
    }
    if(is_array($name)){
        $name = implode(' ', $name);
    }
   

    $index = 0;
    foreach($p1 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string, $cols);
            $index += 1;
            }
        }
        
    }

    $string = implode(' ', $string);
    //echo $string;

    $string2 =[];
    $name2 = [];
    $p2 = explode('#', $p2);
    $name2 = $p2[0];
    if(strpos($name2, '|')){
        $name2 = explode('|', $name2);
    }
    if(is_array($name2)){
        $name2 = implode(' ', $name2);
    }
    

    $index = 0;
    foreach($p2 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string2, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string2, $cols);
            $index += 1;
            }
        }
        
    }
   
    $string2 = implode(' ', $string2);
    //echo $string2;
    
    $string3 = [];
    $name3 = [];
    $p3 = explode('#', $p3);
    $name3 = $p3[0];
    if(strpos($name3, '|')){
        $name3 = explode('|', $name3);
    }
    if(is_array($name3)){
        $name3 = implode(' ', $name3);
    }
    

    $index = 0;
    foreach($p3 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string3, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string3, $cols);
            $index += 1;
            }
        }
        
    }

    $string3 = implode(' ', $string3);

   // echo $string."<br>"; echo $string2."<br>"; echo $string3."<br>";

    $p1_p2 = docbook_prescription_comparisonWinkler($string, $string2 , 0.1, 80);
    $name1_2 = docbook_prescription_comparisonWinkler($name, $name2 , 0.1, 80);

    $p1_p3 = docbook_prescription_comparisonWinkler($string, $string3 , 0.1, 80);
    $name1_3 = docbook_prescription_comparisonWinkler($name, $name3 , 0.1, 80);

    $p2_p3 = docbook_prescription_comparisonWinkler($string2, $string3, 0.1, 80);
    $name2_3 = docbook_prescription_comparisonWinkler($name2, $name3 , 0.1, 80);

    $name_high = max($name1_2, $name1_3, $name2_3);
    $recommend_specialist = "";
   // echo $name;
   // echo $name2; echo $name3;
   //echo $name_high;
    if($name_high < 95){
        $recommend_specialist = "YES";
    }else{
        $recommend_specialist = "NO";
    }


    $result = [];

    $choose = max($p1_p2, $p1_p3, $p2_p3);
    $chosen_ids = [];
    if($choose == $p1_p2){
        array_push($chosen_ids, $pres_ids[0], $pres_ids[1]);

    }else if($choose == $p1_p3){
        array_push($chosen_ids, $pres_ids[0], $pres_ids[2]);
    }else{
        array_push($chosen_ids, $pres_ids[1], $pres_ids[2]);
    }

    //echo "<br><br><br>";
    //echo "<h3>";
    //echo $string."<br>========"; 
    //echo $string2."<br>======="; 
    //echo $string3."<br>=======";
    //echo "</h3>";
    array_push($result, "Prescription".$pres_ids[0]." and Prescription".$pres_ids[1]."=> ".$p1_p2.'%');
    array_push($result, "Prescription".$pres_ids[0]." and Prescription".$pres_ids[2]." => ".$p1_p3."%");
    array_push($result, "Prescription".$pres_ids[1]." and Prescription".$pres_ids[2]." => ".$p2_p3.'%');
    array_push($result, "Prescription chosen ::: ".implode(',', $chosen_ids));




    //echo $result;



    
   // echo $string;

   // $string = "";

    return view('viewPDF',  ['id2' => $id2, 'chosen_ids' => $chosen_ids, 'detail1_t' => $detail1_t, 'detail2_t' => $detail2_t, 'detail3_t' => $detail3_t, 'detail1' => $detail1, 'detail2' => $detail2, 'detail3' => $detail3, 'recommend' => $recommend_specialist, 'patient_info' => $patient_info,'string' => $result, 'post_info' => $post_info, 'prescriptions' => $prescriptions]);
    
})->name('viewPDF');


Route::get('/home/blogsearch', [SearchBlog::class, 'action'])->name('blogsearch');

Route::get('/doctorhome/postsearch', [SearchPost::class, 'action'])->name('postsearch');


Route::get('/adminProfile',[adminController::Class,'adminProfile']);
Route::get('/PendingPost',[adminController::Class,'PendingPost']);
Route::get('/Notify/{email}/{category}',[adminController::Class,'Notify']);
Route::get('/Delete/{id}',[adminController::Class,'Delete']);

Route::get('/viewblog/viewcomments/{id}', function($id){
    $email= session('patient');
    $user = DB::select("select email from patients where email='$email'");
    
 
 $info = DB::select("select * from patients where email='$email'");
    //dd($user);
    $user_id = ""; $users = "";
    if(session()->has('patient')){
        $email = session('patient');
        $user = DB::select("select email from patients where email='$email'");
        $doc_info = DB::select("select * from doctors");
        //dd($user);
    }else if(session()->has('doctor')){
        $se = session('doctor');
    $user_id = Doctor::where('email', $se)->first()->id;
        $users = Doctor::find($user_id);
        $email = session('doctor');
        $user = DB::select("select email from doctors where email='$email'");
        $doc_info = DB::select("select * from doctors where email='$email'");
        //dd($user);
    }else{

    }
    $blogs = DB::select("select * from blogs where id='$id'");

    $comments = DB::select("select * from comments where blog_id='$id' order by created_at desc");

    return view("comment", ['users' => $users, 'doc_info' => $doc_info, 'info' => $info, 'blogs' => $blogs, 'comments'=> $comments, 'user' => $user]);

});

Route::post('home/view_followup/post_message', [PostMessage::class, 'postMessage']);
Route::post('post_comment', [CommentController::class, 'postComment']);

Route::get('home/view_followup/{id}', function($id){

    
    $se = $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");

    if(session()->has('patient')){
        $se = session('patient');
        $userType = "P";

        $follows = DB::select("select * from follow_ups where id='$id'");
        $patient_info = DB::select("select * from patients where email='$se'");
        return view('view_followup', ['info' => $info, 'type' => $userType,'email' => $se, 'follows' => $follows, 'patient_info' => $patient_info]);
    }else{
        $se = session('doctor');

        $info = DB::select("select * from patients");
        $user_id = Doctor::where('email', $se)->first()->id;
        $users = Doctor::find($user_id);
        $userType = "D";
        $doc_info = DB::select("select * from doctors where email='$se'");
        $follows = DB::select("select * from follow_ups where id='$id'");
        return view('view_followup', ['users' => $users, 'info' => $info, 'type' => $userType, 'email' => $se, 'follows' => $follows, 'doc_info' => $doc_info]);
    }

});
Route::post('home/post_message', [PostMessage::class, 'postMessage']);

// SPECIALIST CODES
Route::get('/s_home', function () {
    if(session()->has('specialist')){
        $se = session('specialist');
        $s_id = SpecialistDoctor::where('email', $se)->first()->id;
        //echo $s_id;
        $post_s = S_Post::where('specialist_id', $s_id)->get();
        $ids = [];

        
        foreach($post_s as $p){
            if(PostStatus::where('post_id', $p->post_id)->first()->status != 'done'){
                array_push($ids, $p->post_id);
            }else{
                
            }
            
        }

    

        $post_info = MedPost::whereIn('id', $ids)->get();
        foreach($post_info as $x){
            //echo $x->id;
        }
        
        
        $doc_info = DB::select("select * from specialist_doctors where email='$se'");
        $patient_info = DB::select("select * from patients");
        $user_id = SpecialistDoctor::where('email', $se)->first()->id;
        $users = SpecialistDoctor::find($user_id);


        return view('s_home', ['users' => $users, 'post_info' => $post_info, 'doc_info'=>$doc_info, 'patient_info' => $patient_info]);
    
    }else{
        return view('login');
    }

    
})->name('s_home');


Route::get('home/recommend_s/{post_id}', function($post_id){

    $s_doc = SpecialistDoctor::all();

    $post = MedPost::find((int)$post_id);
    $field = $post->problem_type;
    $assigned_doc = "";

    if($field == "Uncategorized"){
        $assigned_doc = SpecialistDoctor::all()->random(1)->first;
    }else{
        $assigned_doc = SpecialistDoctor::where('field', $field)->get()->random(1)->first();


    }

   // return $assigned_doc->fname;


    S_Post::insert([
        'post_id' => $post_id,
        'specialist_id' => $assigned_doc->id

    ]);

    PostStatus::insert([
        'post_id' => $post_id,
        'status' => 'assigned'

    ]);


    $se = session('patient');
    $info = DB::select("select * from patients where email='$se'");
    

    $post_info = DB::select("select * from med_posts where patient_email='$se'");

      
    $patient_info = DB::select("select * from patients where email='$se'");
    echo "<html><script>alert('Your post has been assigned to a specialist');</script></html>";

    return view('view_prescriptions',  ['info' => $info, 'post_info' => $post_info, 'patient_info' => $patient_info]);






/*

    foreach($s_doc as $s){
        if($s->field){

        }
    }
*/


});

Route::post('s_home/special_suggestion', function(Request $request){
    /*
    echo request()->sug."\n";
    echo request()->specialist_id."\n";
    echo request()->post_id."\n";
    echo request()->pres_id."\n";
*/
   
    S_Prescription::insert([
        'post_id' => request()->post_id,
        'specialist_id' => request()->specialist_id,
        'prescription_id' => request()->pres_id,
        'comment' => request()->sug
    ]);

   PostStatus::where('post_id', request()->post_id)->update(['status' => 'done']);

    echo "<html><script>alert('Successfully given feedback to the patient');</script></html>";


    return redirect(route('s_home'));



})->name('special_suggestion');

Route::get('s_home/specialist_post/{post_id}', function($id){


    $se = session('specialist');
    $post_info = DB::select("select * from med_posts where id='$id'");
    $post_info = $post_info[0];

    $patient_info = DB::select("select * from patients");
    $doc_info = DB::select("select * from specialist_doctors where email='$se'");   
    $pdf = DB::select("select pdf from med_posts where id='$id'");
   
    $pat_email =  DB::select("select patient_email from med_posts where id='$id'");
    $e = $pat_email[0]->patient_email;
    //print_r();
    $images =  DB::select("select image from med_posts where id='$id'");

    
    $patient_detail = DB::select("select * from patients where email='$e'");

    
    
    $user_id = SpecialistDoctor::where('email', $se)->first()->id;
    $users = SpecialistDoctor::find($user_id);

    /* PRECRIPTION CODE AGAIN

    */

    $prescriptions = DB::select("select * from prescriptions where post_id='$id'");
    
    $pres = [];
    $pres_ids = [];
    
    $index = 0;
    foreach($prescriptions as $p){
        array_push($pres, $p->information);
        array_push($pres_ids, $p->id);

    }
    
    $p1=$pres[0]; $p2=$pres[1]; $p3=$pres[2];

    

    $detail1 = convertPrescription("1", $p1); $detail2 = convertPrescription("2", $p2); $detail3 = convertPrescription("3", $p3);
   
    $detail1_t = convertPrescription_t("1", $p1);
    $detail2_t = convertPrescription_t("2", $p2);
    $detail3_t = convertPrescription_t("3", $p3);

   //print_r($detail1);
  // print_r($detail2);

//print_r($detail3);



    

    $string = [];
    $name = [];

    $p1 = explode('#', $p1);
    $name = $p1[0];
    if(strpos($name, '|')){
        $name = explode('|', $name);
    }
    if(is_array($name)){
        $name = implode(' ', $name);
    }
   

    $index = 0;
    foreach($p1 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string, $cols);
            $index += 1;
            }
        }
        
    }

    $string = implode(' ', $string);
    //echo $string;

    $string2 =[];
    $name2 = [];
    $p2 = explode('#', $p2);
    $name2 = $p2[0];
    if(strpos($name2, '|')){
        $name2 = explode('|', $name2);
    }
    if(is_array($name2)){
        $name2 = implode(' ', $name2);
    }
    

    $index = 0;
    foreach($p2 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string2, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string2, $cols);
            $index += 1;
            }
        }
        
    }
   
    $string2 = implode(' ', $string2);
    //echo $string2;
    
    $string3 = [];
    $name3 = [];
    $p3 = explode('#', $p3);
    $name3 = $p3[0];
    if(strpos($name3, '|')){
        $name3 = explode('|', $name3);
    }
    if(is_array($name3)){
        $name3 = implode(' ', $name3);
    }
    

    $index = 0;
    foreach($p3 as $cols){
        if($index <= 4){
            if(strpos($cols, "|")){
                $l = explode('|', $cols);
                
                foreach($l as $L){
                    array_push($string3, $L);
                    
                }
                $index += 1;
            }else{
            array_push($string3, $cols);
            $index += 1;
            }
        }
        
    }

    $string3 = implode(' ', $string3);

   // echo $string."<br>"; echo $string2."<br>"; echo $string3."<br>";

    $p1_p2 = docbook_prescription_comparisonWinkler($string, $string2 , 0.1, 80);
    $name1_2 = docbook_prescription_comparisonWinkler($name, $name2 , 0.1, 80);

    $p1_p3 = docbook_prescription_comparisonWinkler($string, $string3 , 0.1, 80);
    $name1_3 = docbook_prescription_comparisonWinkler($name, $name3 , 0.1, 80);

    $p2_p3 = docbook_prescription_comparisonWinkler($string2, $string3, 0.1, 80);
    $name2_3 = docbook_prescription_comparisonWinkler($name2, $name3 , 0.1, 80);

    $name_high = max($name1_2, $name1_3, $name2_3);
    $recommend_specialist = "";
/*
    echo $name."<br>"; echo $name2."<br>"; echo $name3."<br>";
    echo $name1_2."<br>";
    echo $name1_3."<br>";; echo $name2_3."<br>";;
   echo $name_high;
*/
    if($name_high < 95){
        $recommend_specialist = "YES";
    }else{
        $recommend_specialist = "NO";
    }


    $result = [];

    $choose = max($p1_p2, $p1_p3, $p2_p3);
    $chosen_ids = [];
    if($choose == $p1_p2){
        array_push($chosen_ids, $pres_ids[0], $pres_ids[1]);

    }else if($choose == $p1_p3){
        array_push($chosen_ids, $pres_ids[0], $pres_ids[2]);
    }else{
        array_push($chosen_ids, $pres_ids[1], $pres_ids[2]);
    }

    $id_p = $id;
    $special_id = SpecialistDoctor::where('email', $se)->first()->id;

    return view('prescription',  ['special_id' => $special_id, 'id_p' => $id_p, 'chosen_ids' => $chosen_ids, 'users' => $users, 'images' => $images, 'pat_email'=>$e, 'patient_detail' => $patient_detail, 'pdf' => $pdf, 'id' => $id, 'post_info' => $post_info, 'doc_info' => $doc_info, 'patient_info'=>$patient_info]);



});


Route::get('home/appt', function(){
    if(session()->has('doctor')){
        $se = session('doctor');
        $info = DB::select("select * from doctors where email='$se'");
        return view('appt', ['info' => $info]);
    } else if(session()->has('patient')){
        $se = session('patient');
        $info = DB::select("select * from patients where email='$se'");
        //echo $info;
        $blogs = Blog::all()->sortByDesc('created_at');

        return view('appt', ['info' => $info, 'blogs' => $blogs]);
    } else if(session()->has('specialist')){
     return redirect('/s_home');
        /*
        $se = session('specialist');
        $post_info = DB::select("select * from med_posts order by id desc");
        
        $doc_info = DB::select("select * from specialist_doctors where email='$se'");
        $patient_info = DB::select("select * from patients");
        $user_id = SpecialistDoctor::where('email', $se)->first()->id;
        $users = SpecialistDoctor::find($user_id);


        return view('s_home', ['users' => $users, 'post_info' => $post_info, 'doc_info'=>$doc_info, 'patient_info' => $patient_info]);
   */
    } else if(session()->has('admin')){
        $se = session('admin');
        $info = DB::select("select * from admins where email='$se'");

        return view('appt', ['info' => $info]);
    } else if(session()->has('hospital_admin')){
        $se = session('hospital_admin');
        $info = DB::select("select * from hospital_admins where email='$se'");

        return view('hospitalad', ['info' => $info]);
    }else{
        return view('login');
    }

})->name('appt');


Route::get('/about', function () {
    if(session()->has('doctor')){
        $se = session('doctor');
        $info = DB::select("select * from doctors where email='$se'");
        return view('about', ['info' => $info]);
    } else if(session()->has('patient')){
        $se = session('patient');
        $info = DB::select("select * from patients where email='$se'");


        return view('about', ['info' => $info]);
    } else if(session()->has('specialist')){
        $se = session('specialist');
        $info = DB::select("select * from specialist_doctors where email='$se'");

        return view('about', ['info' => $info]);

       
    }
    else{

    }

    
})->name('about');