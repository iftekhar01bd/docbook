<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function store(Request $request){

        Blog::insert([
           'doctor_email' => session('doctor'),
           'title' => $request->title,
           'content' => $request->content,
           'created_at' => Carbon::now()
            
        ]);

        return redirect()->route('doctorhome');

    }
}
