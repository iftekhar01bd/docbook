<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Patient Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
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
                  <a class="nav-link" href="{{ route('followups') }}">FOLLOW UPS</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
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




<!--------------section--2---------->

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

       <form action="" method="">
           <h4><b>Created At:</b>  {{\Carbon\Carbon::parse($b->created_at)->toDayDateTimeString()}}</h4>
           <label><b>Doctor Email: &nbsp</b> </label>{{$b->doctor_email}} <br>
           <label for="title"><b>Blog Title:</b> </label><p>{{$b->title}}</p> <br>
           <label for="content" style="align-items: center;"><b>Blog Content:</b> </label><br><span>{{$b->content}}</span>
         <br><br>

           <a class="btn-primary btn-lg" href="/viewblog/viewcomments/".$b->id>Comments</a>
         

       </form>
     
       
     </div>
    
</div>
<br><br>
<br>

  @endforeach



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

















<!-----------bootstrap js link------------->
<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
  
   fetch_blog_data();
  
   function fetch_blog_data(query = '')
   {
    $.ajax({
     url:"{{ route('blogsearch') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('#blogdisplay').html(data.table_data);
      $('#total_records').text(data.total_data);
     }
    })
   }
  
   $(document).on('keyup', '#search_blog', function(){
    var query = $(this).val();
    fetch_blog_data(query);
   });
  });
  </script>


  

</body>


</html>