<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Smart Attestation</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/consul.css">
<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
    
    
    
    
</head>

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
<li>
  
  

<div class="profile-wrap">
  
  <div class="photoD">
@foreach($info as $i)
<a href="#"><img class='photo' width='100px' height='80px' src=/{{ $i->propic }} alt="profile pic"></a>
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
  
</li>
              </ul>


            </div>
          </div>
        </nav>

      </div>
  </div>
</div>


              <div class="pres_container"
        
              @foreach($post_info as $i)
              <div class="card">
                @if($recommend == "YES")
                 <h3> Recommend Specialist</h3>
                @else
                @foreach($string as $s)
                <h4>{{$s}}</h4>
                @endforeach
                @foreach($chosen_ids as $id)
                <a class="btn btn-primary" href="/home/viewPDF/{{$id_p}}/{{$id}}">View Prescription {{$id}} </a>
                @endforeach
                @endif
                   
                     
                
                  @endforeach
  






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