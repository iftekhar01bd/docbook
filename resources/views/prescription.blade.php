@if(session()->has('doctor'))

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Doctor Homepage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dochome.css">
<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    
    
    
</head>


<body>

  <div class="container">
    <div class="logo">
        <img src="/images/logofin.png" alt="LOGO" width="160px" height="60px">
  
    </div>
  
    <div class="right_container">
        
        <div class="bottom">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-top">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex align-items-center">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('doctorhome')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('view_blog') }}">View Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('blog') }}">Write Blog</a>
                  </li>
         
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Notifications
                    </a>
          
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 
                     
                        @forelse ($users->notifications as $notification)
                        @if($notification->data['category'] != "FOLLOW UP")
                        <li><a href="{{url('doctorhome/deletenotification/'.$notification->id)}}" class="dropdown-item" href="#">{{"Patient With ID ".$notification->data['id'].$notification->data['message']}}{{" on category "}}{{$notification->data['category']}}</a></li>
                        @endif
                        @empty
                        <li><a class="dropdown-item" href="#">No Notifications :(</a></li>
                       
                        @endforelse
                      
                     
                    </ul>
                  </li>
  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Follow Up Notifications
                    </a>
          
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 
                     
                        @forelse ($users->notifications as $notification)
                        @if($notification->data['category'] == "FOLLOW UP")
                        <li><a href="{{url('doctorhome/deletenotification/'.$notification->id)}}" class="dropdown-item" href="#">{{"Patient With ID ".$notification->data['id'].$notification->data['message']}}{{" on category "}}{{$notification->data['category']}}</a></li>
                        @endif
                        
                        @empty
                        <li><a class="dropdown-item" href="#">No Notifications :(</a></li>
                       
                        @endforelse
                      
                     
                    </ul>
                  </li>
            
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('followups') }}">Follow-up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                  </li>
                   
    
    
  
  <div class="profile-wrap">
    
    <div class="photoD">
  @foreach($doc_info as $i)
  <a href="#"><img class='photo' width='100px' height='80px' src=/{{ $i->propic }} alt="profile pic"></a>
  @endforeach
  
    </div>
  
  
  <div class="container">
    <div class="name">
    <a href="#">
     
      <p>{{session('doctor')}}</p>
      <a href="/logout">Log Out </a>
  
    </a>
  </div>
    
  </div>
  
  </div>
  </li>
  
  <li>
    
  </li>
                </ul>
  
  
              </div>
            </div>
          </nav>
  
        </div>
    </div>
  </div>
  
  
  
  
  
          
  
  
  


              <div class="container">
                <div class="col">
                  <div class="container">
                    @foreach($pdf as $p)
                  <iframe height='600' width='550' src="/{{$p->pdf}}" ></iframe>
  
                  @endforeach
                  </div>

                  <div class="container3">
                   
                    @foreach($patient_detail as $x)
                    
            <span style="font-size: 20pt;"><b>Patient Picture:</b> </span><a href="#"><img width='100px' height='80px' src="/{{ $x->propic }}" alt="profile pic"></a><br/>
            
                    <span style=""> <b>Patient ID:</b> {{$x->userid}}</span><br/>
                        
                        <span style=""> <b>Patient Email:</b> {{$x->email}}</span><br/>
                        <span style=""> <b>Patient Full Name:</b> {{$x->fname}} {{$x->lname}}</span><br/>
                        <span style=""> <b>Patient Age:</b>{{$x->age}}</span><br/>
                        <span style=""><b> Patient Gender:</b> {{$x->gender}}</span><br/>
                        <span style=""><b> Patient Phone: </b>{{$x->phone}}</span><br/>
                        <span style=""> <b>Patient BloodGroup:</b> {{$x->bloodgroup}}</span><br/>

                    @endforeach
                  </div>

                  <div class="container3">
                    
                    <span style=""> <b>Post Problem Type:</b> {{$post_info->problem_type}}</span><br/>
                    <span style=""> <b>Post Details: </b> {{$post_info->details}}</span><br/>
                    
                  </div>
                </div>

                

                
                
              </div>

              <div class="container3">
                <span style="font-weight: bold;">Patient Picture Uploaded:</span> <br/>
                @foreach($images as $im)
                <a href="#"><img style="width: 100%; height: 30%;" width='800px' height='600px' src="/{{ $im->image}}" alt="image pic"></a><br/>
                
                @endforeach


              </div>




<div class="container">

              <form name="add_pres" id="add_pres">  
                  @csrf


                <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
                </div>
    
    
                <div class="alert alert-success print-success-msg" style="display:none">
                 
                <ul></ul>
                </div>
    
    
                <div class="container">

                 
                <div class="table-responsive"> 
                    
                  <table class="table table-bordered" id="dynamic_table">  
                        
                    <thead>
                        <td><h2>Medicines:</h2></td> 
                        
                       
                    </thead>
                    <tbody id="med_sec">
                       
                         <tr id='med_row'>  
                        <div class="medicine">
                            
                            <td><input type="text" name="name[]" placeholder="Medicine Name" class="form-control name_list" /></td>
                            <td><input type="text" name="time[]" placeholder="Time" class="form-control time_list" /></td>  
                            <td><input type="text" name="continue[]" placeholder="Continuation Days" class="form-control continue_list" /></td>  
                            <td><input type="text" name="intake[]" placeholder="Intake Amount" class="form-control intake_list" /></td>  
                            <td><textarea name="describe[]" class="form-control" placeholder="Describe"></textarea></td>  
                        <td><button type="button" name="add_med" id="add_med" class="btn btn-success">+</button></td>  

                      
                       
                        </div>
                    

                    </tr>  
                    </tbody>


                    <thead>
                        <td><h2>Tests:</h2></td> 
                    </thead>

                <tbody id="test_sec">
                    <tr id="test_row">

                        <div class="test">
                            
                            <td><input type="text" name="test_name[]" placeholder="Test Name" class="form-control test_name_list" /></td>
                            <td><input type="text" name="reason[]" placeholder="Time" class="form-control reason_list" /></td>  
                            <td><input type="text" name="hospital[]" placeholder="Hospital" class="form-control hospital_list" /></td>  
                            
                        <td><button type="button" name="add_test" id="add_test" class="btn btn-success">+</button></td>  

                    </div>


                </tr>

            </tbody>

            <tfoot>
                <tr>  

                       <td> <label for="tips">Tips: </label></td>
                        <td><textarea id="tips" name="tips[]" class="form-control" placeholder="Tips"></textarea></td>  

                        <td><label for="advice">Advice: </label></td>
                        <td><textarea id="advice" name="advice[]" class="form-control" placeholder="Advice"></textarea></td>  
                    
                    </tr>  
                   
            </tfoot>  
                </table>  
                    <input type="button" name="submit_pres" id="submit_pres" class="btn btn-info" value="Submit" />  
                </div>
                <td><input name="post_id" id="post_id" type="hidden" value="{{$id}}"/></td>
                <td><input name="pat_email" id="pat_email" type="hidden" value="{{$post_info->patient_email}}"/></td>

    
    
             </form>

            </div>

          </div>

             

             <!-- CODE FOR HANDLING FORM -->
             <script type="text/javascript">
                $(document).ready(function(){      
                  var postURL = "{{ route('add_pres')}}";
                  var i=1; 
                  var j = 1; 

                  function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });  

      }
            
            
                  $('#add_med').click(function(){  
                      //alert("clicked");
                       i++;  
                       var str = "<tr id='med_row" +i+"' class='dynamic_added'><td><input type='text' name='name[]' placeholder='Medicine Name' class='form-control name_list' /></td><td><input type='text' name='time[]' placeholder='Time' class='form-control time_list' /></td>  <td><input type='text' name='continue[]' placeholder='Continuation Days' class='form-control continue_list' /></td>  <td><input type='text' name='intake[]' placeholder='Intake Amount' class='form-control intake_list' /></td>  <td><textarea name='describe[]' class='form-control' placeholder='Describe'></textarea></td>  <td><button type='button' name='remove' id=" + i + " class='btn btn-danger btn_remove'>X</button></td></tr>";    
                       $('#med_sec').append(str);  
                  });  
            

                $('#add_test').click(function(){  
                      //alert("clicked");
                       j++;  
                       var str = " <tr id='test_row" + j + "' class='test_added'><div class='test'> <td><input type='text' name='test_name[]' placeholder='Test Name' class='form-control test_name_list' /></td><td><input type='text' name='reason[]' placeholder='Time' class='form-control reason_list'/></td>  <td><input type='text' name='hospital[]' placeholder='Hospital' class='form-control hospital_list' /></td><td><button class='btn btn-danger test_btns' type='button' name='remove' id=" + j + ">X</button></td> </div></tr>";  
                       $('#test_sec').append(str);  
                  });  
                
            
            
                  $(document).on('click', '.btn_remove', function(){  
                      //alert("clicked");
                      //alert('remove');
                       var button_id = $(this).attr("id");   

                       try{
                        $("#med_row"+button_id + '').remove(); 
                       // alert($('#med_row'+button_id).attr('id'));
                         
                       }catch(err){
                           alert(err);

                           console(err);
                       }
                      
                       //alert('#row'+button_id+'');
                  });  

                  $(document).on('click', '.test_btns', function(){  
                      //alert('remove');
                       var button_id = $(this).attr("id");   
                       //alert(button_id);

                       try{
                        $("#test_row" + button_id).remove(); 
                       // alert($('#med_row'+button_id).attr('id'));
                         
                       }catch(err){
                           alert(err);

                           console(err);
                       }
                      
                       //alert('#row'+button_id+'');
                  });

                  $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

                  $('#submit_pres').click(function(){     
            alert('Prescription Submitted! :)');       
           $.ajax({  
            
                method:"POST",  
                enctype: 'multipart/form-data',
                url:'{{ route("add_pres") }}',
                data:$('#add_pres').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                        
                    }else{
                     

                        i=1;
                        j = 1;
                        $('.dynamic_added').remove();
                        $('.test_added').remove();
                        $('#add_pres')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');

                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        //alert(data);
                       
                          //alert(data);
                          window.location.href = "{{ url('/doctorhome') }}";
                        
                    }
                }  
           });  
      });  


     

                


        

    });
            
            
                
            </script>

















<!--------section-5-footer----->
<div class="container-fluid p-0">
    <div class="footer">
        <div class="container">
            <div class="row text-center" style="padding: 18px 18px;">
                <div class="col-md-3">
                    <p>Emergency Chat With </p>
                    <p><strong>Hospitals</strong></p>
                </div>
                <div class="col-md-3">
                    <p>Emergency Chat With</p>
                    <p><strong>Doctors</strong></p>
                </div>
                <div class="col-md-3">
                    <p>Top Article of the</p>
                    <p><strong>Doctors</strong></p>
                </div>
                <div class="col-md-3">
                    <p>Suggesition for</p>
                    <p><strong>Covid-19</strong></p>
                </div>
                
                
                
            </div>
            
            
        </div>
    </div>
</div>


















<!-----------bootstrap js link------------->
<script src="/js/bootstrap.min.js"></script>

</body>

</html>

@elseif(session()->has('specialist'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Doctor Homepage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dochome.css">
<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    
    
    
</head>


<body>

  <div class="container">
    <div class="logo">
        <img src="/images/logofin.png" alt="LOGO" width="160px" height="60px">
  
    </div>
  
    <div class="right_container">
        
        <div class="bottom">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-top">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex align-items-center">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('s_home')}}">Home</a>
                  </li>
                 
         
                 
                  
  
                 
            
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                  </li>
                   
    
    
  
  <div class="profile-wrap">
    
    <div class="photoD">
  @foreach($doc_info as $i)
  <a href="#"><img class='photo' width='100px' height='80px' src=/{{ $i->propic }} alt="profile pic"></a>
  @endforeach
  
    </div>
  
  
  <div class="container">
    <div class="name">
    <a href="#">
     
      <p>{{session('doctor')}}</p>
      <a href="/logout">Log Out </a>
  
    </a>
  </div>
    
  </div>
  
  </div>
  </li>
  
  <li>
    
  </li>
                </ul>
  
  
              </div>
            </div>
          </nav>
  
        </div>
    </div>
  </div>
  
  
  
  
  
          
  
  
  


              <div class="container">
                <div class="col">
                  <div class="container">
                    @foreach($pdf as $p)
                  <iframe height='600' width='550' src="/{{$p->pdf}}" ></iframe>
  
                  @endforeach
                  </div>

                  <div class="container3">
                   
                    @foreach($patient_detail as $x)
                    
            <span style="font-size: 20pt;"><b>Patient Picture:</b> </span><a href="#"><img width='100px' height='80px' src="/{{ $x->propic }}" alt="profile pic"></a><br/>
            
                    <span style=""> <b>Patient ID:</b> {{$x->userid}}</span><br/>
                        
                        <span style=""> <b>Patient Email:</b> {{$x->email}}</span><br/>
                        <span style=""> <b>Patient Full Name:</b> {{$x->fname}} {{$x->lname}}</span><br/>
                        <span style=""> <b>Patient Age:</b>{{$x->age}}</span><br/>
                        <span style=""><b> Patient Gender:</b> {{$x->gender}}</span><br/>
                        <span style=""><b> Patient Phone: </b>{{$x->phone}}</span><br/>
                        <span style=""> <b>Patient BloodGroup:</b> {{$x->bloodgroup}}</span><br/>

                    @endforeach
                  </div>


                  <div class="container3">
                    
                    <span style=""> <b>Post Problem Type:</b> {{$post_info->problem_type}}</span><br/>
                    <span style=""> <b>Post Details: </b> {{$post_info->details}}</span><br/>
                    
                  </div>
                </div>

                

                
                
              </div>

              <div class="container3">
                <span style="font-weight: bold;">Patient Picture Uploaded:</span> <br/>
                @foreach($images as $im)
                <a href="#"><img style="width: 100%; height: 30%;" width='800px' height='600px' src="/{{ $im->image}}" alt="image pic"></a><br/>
                
                @endforeach


              </div>






 
  @foreach($chosen_ids as $id)
  <div class="cont2" style="display: flex; flex-direction: column; padding: 10px; justify-content: center; align-items: center;">
  <a class="btn btn-primary" href="/home/viewPDF/{{$id_p}}/{{$id}}">View Prescription {{$id}} </a>
  @endforeach
  </div>

  <form action="{{route('special_suggestion')}}" method="POST">
    @csrf
    <input type="hidden" value="{{$id_p}}" name="post_id">
    <input type="hidden" value="{{$special_id}}" name="specialist_id">

    Choose Prescription for Patient: 
    <select name="pres_id">

      @foreach($chosen_ids as $pres)

      <option value="{{$pres}}">Prescription {{$pres}}</option>



      @endforeach

      </select><br><br>
    <label for="sug">Give Suggestion: </label>

    <textarea name="sug" class="form-control" id="sug" rows="12"></textarea>

    <button type="submit" class="btn btn-primary">Send</button>
  </form>
     
       
  

    



<!--------section-5-footer----->
<div class="container-fluid p-0">
    <div class="footer">
        <div class="container">
            <div class="row text-center" style="padding: 18px 18px;">
                <div class="col-md-3">
                    <p>Emergency Chat With </p>
                    <p><strong>Hospitals</strong></p>
                </div>
                <div class="col-md-3">
                    <p>Emergency Chat With</p>
                    <p><strong>Doctors</strong></p>
                </div>
                <div class="col-md-3">
                    <p>Top Article of the</p>
                    <p><strong>Doctors</strong></p>
                </div>
                <div class="col-md-3">
                    <p>Suggesition for</p>
                    <p><strong>Covid-19</strong></p>
                </div>
                
                
                
            </div>
            
            
        </div>
    </div>
</div>


















<!-----------bootstrap js link------------->
<script src="/js/bootstrap.min.js"></script>

</body>

</html>
@else

@endif