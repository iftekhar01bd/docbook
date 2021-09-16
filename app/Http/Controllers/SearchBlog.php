<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class SearchBlog extends Controller
{
    function index()
    {
     return view('blogsearch');
    }

    function action(Request $request)
    {
    if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('blogs')
         ->where('title', 'like', '%'.$query.'%')
         ->orWhere('content', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
      
         
      }
      else
      {
       $data = DB::table('blogs')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '<div class="card">
   
        <h5 class="card-header">Blog Form : </h5>
        <div class="card-body">
    
         <form action="" method="">
            <h4><b>Created At:</b> '.Carbon::parse($row->created_at)->toDayDateTimeString().'</h4>
            <label><b>Doctor Email: </b> </label> &nbsp'.$row->doctor_email.' <br>
            <label for="title"><b>Blog Title:</b> </label><p>'.$row->title.'</p> <br>
            <label for="content" style="align-items: center;"><b>Blog Content:</b> </label><br><span>'.$row->content.'</span>
           <br><br>
            <a class="btn-primary btn-lg" href="'.'viewblog/viewcomments/'.$row->id.'"'.'>Comments</a>

    </div>
    <br><br>
    <br>
    </div>
    <br>


        ';
       }
      }
      else
      {
       $output = '
       
        <h4 align="center" colspan="5">No Data Found</h4>
       
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    

    }
}
