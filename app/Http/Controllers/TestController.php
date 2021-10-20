<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HospitalTest;
use App\Models\Test;

class TestController extends Controller
{
    function send(Request $request){

        $test = $request->get('test');
        
 
        HospitalTest::insert([
            'id' => $test['id'],
            'patient_email' => $test['patient_email'],
            'doctor_email' => $test['doctor_email'],
            'test_name' => $test['test_name'],
            'time' => $test['test_time'],
            'hospital' => $test['hospital']
        ]);


        Test::where('id', $test['id'])->delete();

        return redirect(route('admin_test'));





    }
}
