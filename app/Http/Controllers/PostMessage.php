<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\FollowUp;

class PostMessage extends Controller
{
    //

    function postMessage(Request $request){
        if($request->hasFile('image')){
            
            $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('followups'), $imageName);

        $id = $request->id;

        if($id == ""){
            $id = count(FollowUp::all()) + 1;
        }
        FollowUp::insert([
            'id' => $id, 
            'p_email' => $request->p_email,
            'd_email' => $request->d_email,
            'type' => $request->type,
            'message' => $request->msg,
            'image' => "followups/".$imageName,
            'created_at' => Carbon::now()
             
         ]);
        }else{
            $id = $request->id;

            if($id == ""){
                $id = count(FollowUp::all()) + 1;
            }
            FollowUp::insert([
                'id' => $id, 
                'p_email' => $request->p_email,
                'd_email' => $request->d_email,
                'type' => $request->type,

                'image' => "",
                'message' => $request->msg,
                'created_at' => Carbon::now()
                 
             ]);
        }
       
 
         return redirect()->back();


    }
}
