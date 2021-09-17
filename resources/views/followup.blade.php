<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Followups</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/follow.css">
<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
    
    
    
    
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
                  @if(session('patient'))
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('view_prescriptions') }}">View Prescriptions</a>
                  </li>
         
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('view_profile') }}">Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('consul') }}">Get Consultation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('followups') }}">FOLLOW UPS</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>

                  @else
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('doctorhome')}}">Home</a>
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
  
                    <a class="nav-link" href="">View Prescribed Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('followups') }}">Follow Ups</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>

                  @endif
  <li>
    
    
  
  <div class="profile-wrap">
    
    <div class="photoD">
      @if(session('doctor'))
      @foreach($doc_info as $i)
      <a href="#"><img class='photo' width='100px' height='80px' src=/{{ $i->propic }} alt="profile pic"></a>
      @endforeach
      @else
      @foreach($info as $i)
      <a href="#"><img class='photo' width='100px' height='80px' src=/{{ $i->propic }} alt="profile pic"></a>
      @endforeach
      @endif
  
  
    </div>
  
  
  <div class="container">
    <div class="name">
    <a href="#">
     
      <p>{{session('patient')}}</p>
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
  


    
    

    
   
  <div class="follow_container">
    <div class='form-f'>
    <form action="post_message" method="POST" enctype="multipart/form-data" >
    @csrf
    @if(isset($patient_info))
    <input name="p_email" type="hidden" value={{$patient_info[0]->email}}>
    <input name="type" type="hidden" value="P">
    <input name="id" type="hidden" value="">

    <span>Doctor Email: </span><br><input name="d_email"><br>
    @else
    <input name="d_email" type="hidden" value={{$doc_info[0]->email}}>
    <input name="type" type="hidden" value="D">

    <span>Patient Email: </span><br><input name="p_email"><br>

    @endif
    
    
    
    <span style="color: darkblue">Write Message: </span><br>
    <textarea name="msg" rows="5" cols="40"></textarea><br><br>
    <label>Upload Image:</label><br>
    <input class="form-control" name="image" type="file" id="image"> <br> <br>
    <input type="submit" class="btn-primary btn-lg" value="Send"><br><br>
       
    </form>
    @if(count($follows) > 0)
    @php
     $last_id = [];   
    @endphp
    @foreach($follows as $f)
    @if(!in_array($f->id, $last_id))
      <div class="card">
        <h5 class="card-header"> ID: {{$f->id}}</h5>
        <h5 class="card-header">Patient Email: {{$f->p_email}}</h5>
        <h5 class="card-header">Doctor Email: {{$f->d_email}}</h5>
        <h5 class="card-header">Date and Time: {{\Carbon\Carbon::parse($f->created_at)->toDayDateTimeString()}}</h5>
        <div class="card-body">
         <a href="/home/view_followup/{{$f->id}}" class="btn btn-primary">View</a>
    
      
        </div>
      </div><br><br>
    
    @endif
    

    @php
     array_push($last_id, $f->id);
    @endphp
 
       

     
    
    @endforeach
    
    

    
     
    @else
    <br><br>
    <h5 style="text-align: center">NO FOLLOW UPS</h5>

    

    @endif
    

         
 </div>
 <br>

       

   






</div>

  </div>









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