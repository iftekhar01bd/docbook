@if(session()->has('doctor'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Doctor Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dochome.css">
<!--    -------font awesome kit link------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
<link rel="stylesheet" href="/css/consul.css">
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
                  <a class="nav-link" aria-current="page" href="{{route('doctorhome')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('view_blog') }}">View Blogs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('blog') }}">Write Blog</a>
                </li>
       
               
          
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('followups') }}">Follow Ups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                 
  
  

<div class="profile-wrap">
  
  <div class="photoD">
@foreach($info as $i)
<a href="#"><img class='photo' width='100px' height='80px' src={{ $i->propic }} alt="profile pic"></a>
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
                    <div class="infoMain">
                      @foreach($info as $d)
                    <div class="info">
                      <img class="profile_pic" src="/{{ $d->propic }}" alt="profile pic">
                        <span class="text"><b>Name:</b> {{$d->fname}} {{$d->lname}}</span>
      
                       
          
      
      
                    </div>
      
                    <div class="blank">
      
                      
                      
                        <div class="info">
                            <span class="text"><b>Rating: </b> {{$d->rating}}</span>
            
                        </div>
                   
                    <div class="info">
                      <span class="text"><b>Speciality In:</b> {{$d->speciality}}</span>
      
                  </div>
                  
                  <div class="info">
                      <span class="text"><b>Gender:</b> {{ucwords($d->gender)}}</span>
                    
      
                  </div>
                 
                    <div class="info">
                        <span class="text"><b>Email:</b> {{$d->email}}</span>
      <div class="blank">
      
                    </div>
      
                    </div>
                    
      
                    <div class="info">
                      <span class="text"><b>Chamber Address:</b> {{$d->chamberaddress}}</span>
      
      
                  </div>
                 
      
                  <div class="info">
                      <span class="text"><b>Hospital:</b> {{$d->hospital}}</span>
      
      
                  </div>
                 
                  <div class="info">
                      <span class="text"><b>Experience:</b> {{$d->experience}} years</span>
      
      
                  </div>
      
                  <div class="info">
                    <span class="text"><b>BMDC Number:</b> {{$d->bmdc}}</span>
                  
      
                </div>
                
      
                  <div class="info">
                      <span class="text"><b>Degree:</b> {{$d->degree}}</span>
      
      
                  </div>
                 
      
                  <div class="info">
                      <span class="text"><b>Contact Number:</b> {{$d->phone}}</span>
      
      
                  </div>
      
              </div>
      
                 
      
      
                    @endforeach
      
                    <a class="btn btn-primary" href="javascript:history.back()">Go Back</a>
              
          
          </div>
      
      
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



















  
</body>

</html>

@elseif(session()->has('patient'))

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Patient Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
<link rel="stylesheet" href="/css/consul.css">
<!--    -------font awesome kit link------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
    
    
    
</head>
<body>
<!---------section-1---------->
<!------top-heading------>

<!---------bottom heading-------->
<!---------Navigation-bar----------->
<!-- temp-->
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
                  <a class="nav-link" href="{{ route('followups') }}">Follow Ups</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('appt') }}">Book Appointment</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
<li>
  
  

<div class="profile-wrap">
  
  <div class="photoD">
@foreach($info as $i)
<a href="#"><img class='photo' width='100px' height='80px' src={{ $i->propic }} alt="profile pic"></a>
@endforeach

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
  <div style="text-align:center;padding:1em 0;"> <h4><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/country/bd"><span style="color:gray;">DocBook Time, </span><br />Bangladesh</a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FDhaka" width="100%" height="90" frameborder="0" seamless></iframe> </div>
  
</li>
              </ul>


            </div>
          </div>
        </nav>

      </div>
  </div>
</div>



<div class="container">
    <div class="infoMain">
      @foreach($info as $d)
    <div class="info">
      <img class="profile_pic" src="/{{ $d->propic }}" alt="profile pic">
        <span class="text"><b>Name:</b> {{$d->fname}} {{$d->lname}}</span>
        <span class="text"><b>User ID: </b>{{$d->userid}}</span>

    </div>

    <div class="blank">
   
    <div class="info">
      <span class="text"><b>Age: </b> {{$d->age}}</span>

  </div>
  
  <div class="info">
      <span class="text"><b>Gender:</b> {{ucwords($d->gender)}}</span>
    

  </div>
 
    <div class="info">
        <span class="text"><b>Phone:</b> {{$d->phone}}</span>
<div class="blank">

    </div>

    </div>
    

    <div class="info">
      <span class="text"><b>Blood Group:</b> {{$d->bloodgroup}}</span>


  </div>
 

  <div class="info">
      <span class="text"><b>Email:</b> {{$d->email}}</span>


  </div>
 

</div>

 


    @endforeach

    <a class="btn btn-primary" href="javascript:history.back()">Go Back</a>


</div>


</div>
   
  


<div class="bottomDisplay">
<div class="weather">
  <iframe src="https://www.meteoblue.com/en/weather/widget/three/dhaka_bangladesh_1185241?geoloc=fixed&nocurrent=0&noforecast=0&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=image"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 460px; height: 593px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/en/weather/week/dhaka_bangladesh_1185241?utm_source=weather_widget&utm_medium=linkus&utm_content=three&utm_campaign=Weather%2BWidget" target="_blank"></a></div>


</div>

<div class="chat_box">
  <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/d89bf719-09fe-4374-8e8b-5bdcf09d6ec8">
</iframe>
</div>

</div>














<!--------section-5-footer----->
<!--------section-5-footer----->
<div class="container-fluid p-0">
  <div class="footer">
      <div class="dflex justify-content-center">
          <div class="row text-center" style="padding: 5px 0px;">
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

















  

</body>


</html>


@elseif(session()->has('specialist'))
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
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                 
  
  

<div class="profile-wrap">
  
  <div class="photoD">
@foreach($info as $i)
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


                     
                     




<div class="container">
    <div class="infoMain">
      @foreach($info as $d)
    <div class="info">
      <img class="profile_pic" src="/{{ $d->propic }}" alt="profile pic">
        

       



    </div>

    <div class="blank">
        <div class="info">
        <span class="text"><b>Name:</b> {{$d->fname}} {{$d->lname}}</span>
    </div>
    <div class="info">
      <span class="text"><b>Medical Field In:</b> {{$d->field}}</span>

  </div>
  
  <div class="info">
      <span class="text"><b>Gender:</b> {{ucwords($d->gender)}}</span>
    

  </div>
 
    <div class="info">
        <span class="text"><b>Email:</b> {{$d->email}}</span>
<div class="blank">

    </div>

    </div>
    

    <div class="info">
      <span class="text"><b>Chamber Address:</b> {{$d->chamberaddress}}</span>


  </div>
 

  <div class="info">
      <span class="text"><b>Hospital:</b> {{$d->hospital}}</span>


  </div>
 
  <div class="info">
      <span class="text"><b>Experience:</b> {{$d->experience}} years</span>


  </div>

  <div class="info">
    <span class="text"><b>License Number:</b> {{$d->licenseno}}</span>
  

</div>


  <div class="info">
      <span class="text"><b>Degree:</b> {{$d->degree}}</span>


  </div>
 

  <div class="info">
      <span class="text"><b>Contact Number:</b> {{$d->phone}}</span>


  </div>

</div>

 


    @endforeach

    <a class="btn btn-primary" href="javascript:history.back()">Go Back</a>


</div>


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


@endif