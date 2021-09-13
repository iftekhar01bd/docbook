<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    function postComment(Request $request){

        $email = $request->email;
        $content = $request->content;
        $blog_id = $request->blog_id;

        

        Comment::insert([
            'user_email' => $email,
            'blog_id' => $blog_id,
            'content' => $content,
            'created_at' => Carbon::now()
        ]
        );


        return redirect()->back();

    }
}
