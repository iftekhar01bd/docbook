<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Patient Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/blog.css">
<!--    -------font awesome kit link------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>

    <script>
        function flick(){
            if($('#display_comments').is(':visible')){
                $('#display_comments').hide();

            }else{
                $('#display_comments').show();
            }

        }
        </script>
    
    
    
    
</head>

<body>


<!---------bottom heading-------->
<!---------Navigation-bar----------->
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


<div class="container-fluid p-0">
  <div class="all-body-wrap" style="background: #f3f1f1;
    padding: 50px 0px;">
      <div class="container">
          <div class="body-wrap">
              <div class="catagory-location">
                 <div class="row justify-content-start">
                     <div class="col-md-6">
                  <form action="">
                                        <div class="catagory-search">
                                  <div class="row">
                           <div class="col-md-6">
                            
                            <input type="text" name="search_blog" id="search_blog" class="form-control" placeholder="Search Blogs" />
                          
                           </div>
                           
                      
                           
                           
                           
                           
                           
                       </div>
                         
                           
                               
                     </div>
                  </form>
                     
                     
                     
                  </div>
                 </div>
              </div>
              
        
   
  

<div class="container" name="blogdisplay" id="blogdisplay">
 

  @foreach($blogs as $b)

    <div class="card">
   
      <h5 class="card-header">Blog Form : </h5>
      <div class="card-body">

     
           <h4><b>Created At: </b> {{\Carbon\Carbon::parse($b->created_at)->toDayDateTimeString()}}</h4>
           <label><b>Doctor Email:&nbsp</b> </label>{{$b->doctor_email}} <br>
           <label for="title"><b> Blog Title:</b> </label><br><p>{{$b->title}}</p> <br>
           <label for="content" style="align-items: center;"><b>Blog Content: </b></label><br><span>{{$b->content}}</span>
         <br><br>

         <div class="commentbox">
        
            <form action="/post_comment" method="POST" enctype="multipart/form-data" >
             @csrf
             <span style="color: darkblue">Write Comment: </span><br>
              <textarea name="content" rows="5" cols="40"></textarea><br><br>
              <input type="submit" class="btn-primary btn-lg" value="Post"><br><br>
              <a class="btn-secondary btn-lg" href="javascript:flick()">SHOW / HIDE Comment</a><br><br>

              @foreach($user as $u)
              <input name="email" value={{$u->email}} type="hidden"/>
              <input name="blog_id" value={{$b->id}} type="hidden"/>
              @endforeach
            </form>
            </div>
        
            <div id="display_comments" class="displaycomments">

                @foreach($comments as $c)
                <div class="com">
                
                <span><b>Day, Date and Time: </b> {{\Carbon\Carbon::parse($c->created_at)->toDayDateTimeString()}}</span> <br>
                <span><b>User Email: </b> {{$c->user_email}}</span> <br>
                <span><b>Comment: </b>{{$c->content}}</span> <br>
                
                </div><br><br>

                @endforeach
            </div>

            <br>
         

   
     
       
     </div>
    
</div>
<br><br>
<br>

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