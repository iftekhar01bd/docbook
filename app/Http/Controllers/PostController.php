<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedPost;
use App\Models\FollowUp;
use Illuminate\Support\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Notifications\PostNotification;

class PostController extends Controller
{
    public function post(Request $request){
        $data = $request->input();

        $validated = $request->validate([
            'details' => 'required|max:1000',
        ]);

        if($request->hasFile('post_img')){
            $imageName = time().'.'.$request->post_img->extension();  
            $request->post_img->move(public_path('patient_post_images'), $imageName);
        }else{
            $imageName = 'noimage.png';

        }

        if($request->hasFile('pdf')){
            $pdfName = time().'.'.$request->pdf->extension();  
        $request->pdf->move(public_path('patient_post_pdfs'), $pdfName);
        }else{
            $pdfName = "nopdf.pdf";
        }

        $d = MedPost::all();
        $f = FollowUp::all();

       

        


        if($request->problemtype == "FOLLOW UP"){
            FollowUp::insert([
                'patient_email' => $request->email,
                'doctor_email' => $request->follow_input,
                'post_type' => $request->posttype,
                'problem_type' => $request->problemtype,
                'details' => $request->details,
                'image' => "patient_post_images/".$imageName,
                'pdf' => "patient_post_pdfs/".$pdfName,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'prescription_count' => 0,
                'specialist_count' => 0
                
            ]);

            $doctor_id = DB::select("select id from doctors where email='$request->follow_input'");

            $doctor = Doctor::find($doctor_id[0]->id);
            $message = " has posted his issue at ".date("h:i:sa")." ";
            $patientId = "Unknown ID";
            $category = $request->problemtype;
            foreach (Patient::all() as $pat) {
                if($pat->email == $request->email){
                    $patientId = $pat->userid;
                }
               
            }
            Notification::send($doctor, new PostNotification($patientId, $message, $category));

        }else{
            MedPost::insert([
                'patient_email' => $request->email,
                'post_type' => $request->posttype,
                'problem_type' => $request->problemtype,
                'details' => $request->details,
                'image' => "patient_post_images/".$imageName,
                'pdf' => "patient_post_pdfs/".$pdfName,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'prescription_count' => 0,
                'specialist_count' => 0
                
            ]);

            // NOTIFICATION CODE HERE
            $doctor = Doctor::all();
            $message = " has posted his issue at ".date("h:i:sa")." ";
            $patientId = "Unknown ID";
            $category = $request->problemtype;
            foreach (Patient::all() as $pat) {
                if($pat->email == $request->email){
                    $patientId = $pat->userid;
                }
               
            }
            Notification::send($doctor, new PostNotification($patientId, $message, $category));

        }
       

        return redirect()->back()->with('message', 'Medical Issue Posted Successfully! :)');



        


    }
}
