<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;


class RecommendDoctor extends Controller
{

   public function recommend(Request $request){




        $doctors = Doctor::select("email")
        ->where("email","LIKE","%{$request->q}%")
        ->pluck('email');

        
        return response()->json($doctors);




    }
    //
}
