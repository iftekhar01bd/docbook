<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Patient;

class SearchPost extends Controller
{
   

    function action(Request $request)
    {
    if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('med_posts')
         ->where('problem_type', 'like', '%'.$query.'%')
         ->orWhere('details', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('med_posts')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      $patient_info = Patient::all();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
           if($row->post_type == "Post Anonymously"){
            $email = $row->patient_email;
            foreach($patient_info as $p){
                if($p->email == $email){
                    $output .= '
                    <div class="card">
                    <h5 class="card-header">User ID:'.$p->userid.'</h5>'.
       '<h7 class="card-header">Date and Time: '.Carbon::parse($row->created_at)->toDayDateTimeString().'</h7>'.
       '<h7 class="card-header">Gender: '.ucwords($p->gender).'</h7>'.
      '<div class="card-body">
        <h5 class="card-title">Category: '.$row->problem_type.'</h5>
        <p class="card-text ellipsis">'.$row->details.'</p>
        <a href="home/viewpost/'.$row->id.'" class="btn btn-primary">View Post</a>
         <br><br>
      </div>
</div>
<br>
                    
                    '; 
                }
            }
           

           }else{
            $email = $row->patient_email;
            foreach($patient_info as $p){
                if($p->email == $email){
                    $output .= '
                    <div class="card">
                    <h5 class="card-header">Name: '.$p->fname.' '.$p->lname.'</h5>'.
       '<h7 class="card-header">Date and Time: '.Carbon::parse($row->created_at)->toDayDateTimeString().'</h7>'.
       '<h7 class="card-header">Gender: '.ucwords($p->gender).'</h7>'.
      '<div class="card-body">
        <h5 class="card-title">Category: '.$row->problem_type.'</h5>
        <p class="card-text ellipsis">'.$row->details.'</p>
        <a href="home/viewpost/'.$row->id.'" class="btn btn-primary">View Post</a>
         <br><br>
      </div>
</div>
<br>
                    
                    '; 
                }
            }

           }
       
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
