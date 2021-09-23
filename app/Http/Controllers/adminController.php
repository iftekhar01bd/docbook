<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



use App\Models\MedPost;
use App\Models\FollowUp;
use Illuminate\Support\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Notification;

use App\Notifications\PostNotification;


class adminController extends Controller
{
    public function adminProfile(){






        return view('adminProfile');
    }


    public function pendingPost(){
        $ALL = DB::table('med_posts')
        ->select('patient_email','post_type','id','problem_type','created_at','prescription_count')
        
        ->get();
        



        return view('pending',compact(['ALL']));
    }

    public function Notify( $email , $category){
        
        $message='Admin message';


        $doctor=Doctor::all();

        $patientId='unknown';



        
        foreach (Patient::all() as $pat ) {
            if($pat->email == $email) {
                $patientId = $pat->userid;
                echo $patientId;
            }
           
        }



        

            
            Notification::send($doctor, new PostNotification($patientId, $message, $category));
            
            return redirect()->back()->with('message','successfully notified the doctors');

        

    }

    public function Delete( $id ){
        echo $id;

    }
}





