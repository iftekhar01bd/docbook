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
        $output .= '
        <div class="card">
   
      <h5 class="card-header">Blog Form : </h5>
      <div class="card-body">

       <form action="" method="">
           <h4>Created At: '.Carbon::parse($row->created_at)->toDayDateTimeString().'</h4>
           <label>Doctor Email: </label>'.$row->doctor_email.' <br>
           <label for="title">Blog Title: </label><p>'.$row->title.'</p> <br>
           <label for="content" style="display: flex; align-items: center;">Blog Content: </label><textarea rows="30" cols="100" id="content" name=content">'.$row->content.'</textarea>

           <br><br>

       </form>
     
       
     </div>
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