<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Patient Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
    <link rel="stylesheet" href="/css/consul.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">



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
                    <a class="nav-link" href="{{ route('followups') }}">Follow-up</a>
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

  <div class="container">
              <div class="infoMain">
                @foreach($docs as $d)
              <div class="info">
                <img class="profile_pic" src="/{{ $d->propic }}" alt="profile pic">
                  <span class="text">Name: {{$d->fname}} {{$d->lname}}</span>

                 
    


              </div>

              <div class="blank">

                <div class="rating">
                    <span class="text">Rate Doctor -> </span>
    
                    @foreach($info as $p)
                    <a href="rate/{{$p->id}}/{{$d->id}}/1" ><i class="bi bi-star-fill" style="color:gray;"></i></a>
                    <a href="rate/{{$p->id}}/{{$d->id}}/2" ><i class="bi bi-star-fill" style="color:gray;"></i></a>
                    <a href="rate/{{$p->id}}/{{$d->id}}/3" ><i class="bi bi-star-fill" style="color:gray;"></i></a>
                    <a href="rate/{{$p->id}}/{{$d->id}}/4" ><i class="bi bi-star-fill" style="color:gray;"></i></a>
                    <a href="rate/{{$p->id}}/{{$d->id}}/5" ><i class="bi bi-star-fill" style="color:gray;"></i></a>
    
                    @endforeach
    
    
                </div>
                
                  @foreach($docs as $d)
                @if($d->rating == 0.0)
                <div class="rate">
                  <span>Rating:  </span> 
              <i class="bi bi-star-fill" style="color:gray;"></i>
              <i class="bi bi-star-fill" style="color:gray;"></i>
              <i class="bi bi-star-fill" style="color:gray;"></i>
              <i class="bi bi-star-fill" style="color:gray;"></i>
              <i class="bi bi-star-fill" style="color:gray;"></i>
              <span> ({{$d->rating}})</span>
              </div>
              @elseif($d->rating == 1.0)
              <div class="rate">
                  <span>Rating:  </span> 
                 <i class="bi bi-star-fill" style="color:yellow;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <span> ({{$d->rating}})</span>
              </div>

              @elseif($d->rating == 2.0)
              <div class="rate">
                  <span>Rating:  </span> 
                 <i class="bi bi-star-fill" style="color:yellow;"></i>
                 <i class="bi bi-star-fill" style="color:yellow;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <span> ({{$d->rating}})</span>
              </div>

              @elseif($d->rating == 3.0)
              <div class="rate">
                  <span>Rating:  </span> 
                 <i class="bi bi-star-fill" style="color:yellow;"></i>
                 <i class="bi bi-star-fill" style="color:yellow;"></i>
                 <i class="bi bi-star-fill" style="color:yellow;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <span> ({{$d->rating}})</span>
              </div>

              @elseif($d->rating == 4.0)
              <div class="rate">
                  <span>Rating:  </span> 
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:gray;"></i>
                 <span> ({{$d->rating}})</span>
              </div>

              @elseif($d->rating == 5.0)
              <div class="rate">
                  <span>Rating:  </span> 
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <i class="bi bi-star-fill" style="color:yellow"></i>
                 <span> ({{$d->rating}})</span>
              </div>
              @endif
            @endforeach
             
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
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>

    <!-- 
    <div class="container">

        <div class="container_tab">
        <div class="tabs">

            <span class="tab_t">
               <a href=""> Home</a>
            </span>

            <span class="tab_t">
                <a href=""> News Feed</a>
            </span>

            <span class="tab_t">
                <a href=""> Get Consultation</a>
            </span>

            <div class="mid">
                

            </div>


          


        </div>

        <div class="prof">
                
            @foreach($info as $i)
            <a href="#"><img class="pic" width='100px' height='80px' src="/{{ $i->propic }}" alt="profile pic"></a>
            @endforeach

            <span class="title">{{session('patient')}}</span>
            

        </div>


           
          


            

        </div>


        <div class="doctors">

            @foreach($docs as $d)
               <div class="doc_info">

                 <div class="pic_d">

                    <img class="doc_pic" width='100px' height='80px' src="/{{ $d->propic }}" alt="profile pic">



                 </div>

                 <div class="details">
                     <span>{{$d->fname}} {{$d->lname}}</span>
                     <span>Rating: * * * * * </span>
                     <span>Hospital: {{$d->hospital}}</span>
                     <span>Email: {{$d->email}}</span>


                     




                </div>

               <div class="buttons">
                <button class="ui green button">View Profile</button>
               </div>

               </div>
            @endforeach


        </div>

        <div class="footer">

    <span>DOCCBOOK - FOOTER</span>

        </div>

    </div>

-->
