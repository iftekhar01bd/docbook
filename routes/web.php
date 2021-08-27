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
use App\Http\Controllers\RecommendDoctor;
use App\Models\Prescription;
use App\Http\Controllers\RateController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;

use App\Models\Doctor;

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
        $se = session('specialist');
        $info = DB::select("select * from specialist_doctors where email='$se'");

        return view('home', ['info' => $info]);
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
    return view('consultation',  ['info' => $info, 'docs' => $docs]);
})->name('consul');

Route::get('/home/viewpost/{id}', function($id){
    $se = session('doctor');
    

    $post_info = DB::select("select * from med_posts where id='$id'");

        $doc_info = DB::select("select * from doctors where email='$se'");
        $patient_info = DB::select("select * from patients");

    return view('viewpost',  ['post_info' => $post_info, 'doc_info' => $doc_info, 'patient_info'=>$patient_info]);
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


    return view('prescription',  ['images' => $images, 'pat_email'=>$e, 'patient_detail' => $patient_detail, 'pdf' => $pdf, 'id' => $id, 'post_info' => $post_info, 'doc_info' => $doc_info, 'patient_info'=>$patient_info]);
 
})->name('give_pres');


Route::post('home/add_pres/', [PostPrescription::class, 'store_pres'])->name('add_pres');


Route::get('recommend', [RecommendDoctor::class, 'recommend'])->name('recommend_doc');


Route::get('home/followups', function(){
    
    $se = session('doctor');
    $doc_info = DB::select("select * from doctors where email='$se'");
    $follows = DB::select("select * from follow_ups where doctor_email='$se'");
    $patient_info = DB::select("select * from patients");
    return view('followup', ['email' => $se, 'follows' => $follows, 'patient_info' => $patient_info, 'doc_info' => $doc_info]);
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
    $info = DB::select("select * from patients where email='$se'");
    $docs = DB::select("select * from doctors");

    return view("writeblog", ['doc_info' => $docs, 'info' => $info, 'docs' => $docs, 'doctor_email' => $se]);
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
    

    $post_info = DB::select("select * from med_posts where patient_email='$se'");

      
    $patient_info = DB::select("select * from patients where email='$se'");

    return view('view_prescriptions',  ['post_info' => $post_info, 'patient_info' => $patient_info]);
    
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
		return $result." => High similarity level";
	else
    return $result." => Low similarity level";
}

Route::get('home/smart_attestation/{id}', function($id){
    $se = session('patient');
    $patient_info = DB::select("select * from patients where email='$se'");

    $post_info = DB::select("select * from med_posts where id='$id'");

      
    $prescriptions = DB::select("select * from prescriptions where post_id='$id'");
    
    $pres = [];
    
    $index = 0;
    foreach($prescriptions as $p){
        array_push($pres, $p->information);
    }
    
    $p1=$pres[0]; $p2=$pres[1]; $p3=$pres[2];

    $string = [];

    $p1 = explode('#', $p1);
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


    $string2 =[];
    $p2 = explode('#', $p2);
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

    
    $string3 = [];
    $p3 = explode('#', $p3);
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

    $p1_p2 = docbook_prescription_comparisonWinkler($string, $string2 , 0.1, 80);
    $p1_p3 = docbook_prescription_comparisonWinkler($string, $string3 , 0.1, 80);
    $p2_p3 = docbook_prescription_comparisonWinkler($string2, $string3, 0.1, 80);

    $result = [];
    array_push($result, "Prescription1 and Prescription2 => ".$p1_p2);
    array_push($result, "Prescription1 and Prescription3 => ".$p1_p3);
    array_push($result, "Prescription2 and Prescription3 => ".$p2_p3);

    //echo $result;



    
   // echo $string;

   // $string = "";

    return view('smart_attestation',  ['patient_info' => $patient_info,'string' => $result, 'post_info' => $post_info, 'prescriptions' => $prescriptions]);
    
})->name('smart_attestation');

