<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : View Blogs</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/viewpost.css">
<!--    -------font awesome kit link------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
                    <a class="nav-link" href="{{ route('followups') }}">Follow Ups</a>
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
<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>

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