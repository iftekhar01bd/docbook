<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Specialist Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dochome.css">
<!--    -------font awesome kit link------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>

    
    
    
    
</head>


<body>

<div class="container">
  <div class="logo">
      <img src="images/logofin.png" alt="LOGO" width="160px" height="60px">

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
<a href="#"><img class='photo' width='100px' height='80px' src={{ $i->propic }} alt="profile pic"></a>
@endforeach

  </div>


<div class="container">
  <div class="name">
  <a href="#">
   
    <p>{{session('specialist')}}</p>
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


                     
                     
                     
                  
            
              
<div class="container2" id="postdisplay" name="postdisplay">
  @if(empty($post_info[0]))
  <h2 style="text-align: center"> No Assigned Posts </h2>

  @else
@foreach($post_info as $i)
<div class="card">
    @if($i->post_type == "Post With Name")
    <?php $email = $i->patient_email; ?>
    @foreach($patient_info as $p)
       @if($p->email == $email)
       <h5 class="card-header">Name: {{$p->fname.' '.$p->lname}}, User {{$p->userid}}</h5>
       <h6 class="card-header">Date and Time: {{\Carbon\Carbon::parse($i->created_at)->toDayDateTimeString()}}</h6>
       <h6 class="card-header">Gender: {{ucwords($p->gender)}}</h6>
       <div class="card-body">
        <h5 class="card-title">Category: {{$i->problem_type}}</h5>
        <p class="card-text ellipsis">{{$i->details}}</p>
        <a href="s_home/specialist_post/{{$i->id}}" class="btn btn-primary">View Post</a>
         <br><br>
      </div>
</div>
<br>
       @endif
       
    @endforeach
    
    @else
    <?php $email = $i->patient_email; ?>
    @foreach($patient_info as $p)
       @if($p->email == $email)
       <h5 class="card-header">User {{$p->userid}}</h5>
       <h6 class="card-header">Date and Time: {{\Carbon\Carbon::parse($i->created_at)->toDayDateTimeString()}}</h6>    
        <h6 class="card-header">Gender: {{ucwords($p->gender)}}</h6>
        <div class="card-body">
        <h5 class="card-title">Category: {{$i->problem_type}}</h5>
        <p class="card-text ellipsis">{{$i->details}}</p>
        <a href="s_home/specialist_post/{{$i->id}}" class="btn btn-primary">View Post</a>
        <br><br>
      </div>
    </div>
    <br>

       @endif
       
    @endforeach
    @endif
@endforeach

  </div>
@endif

</div>











<!--------section-5-footer----->
<div class="container2">
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
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

  
</body>

</html>