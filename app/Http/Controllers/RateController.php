<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class RateController extends Controller
{

    public function rate($patientid, $doctorid, $rating){

        $ratings = DB::table('ratings')->where('patient_id', $patientid)->where('doctor_id', $doctorid)->get();
        // $ratings->ratings

        if($ratings->count() == 0){
            Rating::insert([
                'patient_id' => $patientid,
                'doctor_id' => $doctorid,
                'rating' => $rating,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString()
                
            ]);

            $all_ratings = Rating::all();
            $sum = 0;
            foreach($all_ratings as $r){
                $sum += $r->rating;
            }
            if($all_ratings == null){
                $sum = $rating;

            }else{
                $sum = floor($sum / $all_ratings->count());
            }

            Doctor::where('id', $doctorid)->update(array('rating' => $sum));
            return "Rating inserted";

        }else{
            $all_ratings = Rating::all();
            $sum = $rating;
        

            /*
            foreach($all_ratings as $r){
                
               
                $c += 1;
            }
            
            foreach($all_ratings as $r){
                
               if($c != 1){
                   $sum += $r->rating;
               }
                $c += 1;
            }
            

            
                $sum = ceil($sum / $c);
                echo $sum;    

                */
            

            Rating::where('patient_id', $patientid)->where('doctor_id', $doctorid)->update(array('rating' => $sum));

            $all_ratings = Rating::all();
            $sum = $rating;
            $c = 0;

            foreach($all_ratings as $r){
                
               
                $c += 1;
            }

            if($c != 1){
                //  
                foreach($all_ratings as $r){
                
               
                    $sum += $r->rating;
                }
            }
             
 
             echo $sum;
                 $sum = floor($sum / $c);

            Doctor::where('id', $doctorid)->update(array('rating' => $sum));







            return "Rating updated";

        }
        

    }
    
}
