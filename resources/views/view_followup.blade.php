<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook : Doctor Homepage</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
    
    
    
    
</head>


<body>
<!---------section-1---------->
<!------top-heading------>
<div class="container-fluid p-0">
    <div class="section-1">
  <div class="container">
            <div class="row justify-content-end align-items-center">
            
            <div class="col-md-6 offset-3">
                <p style="margin: 0px;">Doctor's Page</p>
            </div>
            
            
            
        </div>
  </div>
    </div>
</div>

<!---------bottom heading-------->
<!---------Navigation-bar----------->
<div class="container-fluid p-0">
    <div class="bottom-heading">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container logo-relation">
  <div class="row align-items-center" style="width: 100%;">
        <div class="col-md-2">
              <div class="logo-wrap">
                  <a class="navbar-brand" href="#">
                  <img src="icons/logofin.png" alt="">
              </a>
              </div>
          </div>
         
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
<div class="col-md-12">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link" href="#">News Feed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">View Prescribed Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        
       
      </ul>
      <!-- --------profile section--------   -->

    
              <div class="profile-wrap">
                  <div class="name">
                  <a href="#">
                   
                    <p>{{session('doctor')}}</p>
                
                  </a>
            </div>
  
              <div class="profile-photo">
                
          
             
            
             
                
          </div>

            </div>
              <a href="/logout">Log Out </a>
            </div>
              </div>

              
     
  
   
      
      
      
      
      
      
      
     </div> 
    
</div>

   
   
   
   
   
    
    
  </div>
    
  
  </div>
</nav> 
     
     
     
     
       
    </div>
</div>


<!--------bottom heading-2------->

<div class="container-fluid p-0">
    <div class="bottom-heading2" style="background: #d2d2d2">
    <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
  <div class="row align-items-center" style="width: 100%;">
          <div class="col-md-3">
             <form class="d-flex">
       
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <input type="submit" value="Find" style="background: #9ba2fd;
    border: 1px solid #6c6cff;
    color: white;
    border-radius: 10px;
    padding: 0px 33px;
    font-weight: 500;">
        
        
      </form>
      
          </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
<div class="col-md-9">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
<!--
        <select class="form-select" aria-label="Default select example" style="width: 15%;border-radius: 20px 10px 20px 10px;
    margin-right: 15px;">
       <option selected>Set location</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
       </select>
      
-->
      
      
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Hospital</a>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" href="#">Doctor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ambulance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Drugs and suppliments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Saved service</a>
        </li>
        
       
      </ul>
      <!-- --------profile section--------   -->

    
              <div class="profile-wrap">
                  <div class="messenger">
                  <a href="#">
                      <i class="fab fa-facebook-messenger"></i>
                  </a>
            </div>
  
              <div class="notification">
                  <i class="fas fa-bell"></i>
          </div>
              </div>
     
  
   
      
      
      
      
      
      
      
     </div> 
    
</div>

   
   
   
   
   
    
    
  </div>
    
  
  </div>
</nav> 
     
     
     
     
       
    </div>
</div>


















<!--------------section--2---------->

<div class="container-fluid p-0">
  <div class="all-body-wrap" style="background: #f3f1f1;
    padding: 50px 0px;">
      <div class="container">
          <div class="body-wrap">
              <div class="catagory-location">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                  <form action="">
                                        <div class="catagory-search">
                                  <div class="row">
                           <div class="col-md-6">
                               <select class="form-select" aria-label="Default select example">
  <option selected>Search by categories</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
                           </div>
                           
                           <div class="col-md-6">
                               <select class="form-select" aria-label="Default select example">
  <option selected>Search by location</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
                           </div>
                           
                           
                           
                           
                           
                       </div>
                         
                           
                               
                     </div>
                  </form>
                     
                     
                     
                  </div>
                 </div>
              </div>
              
        
   
<div class="container" name="followdisplay" id="followdisplay">
 

   
  
      <div class="card">
     
        <h5 class="card-header">Follow Up Form</h5>
        <div class="card-body">
  
       
          

    
  
           <div class="commentbox">
          
              <form action="post_message" method="POST" enctype="multipart/form-data" >
               @csrf

               @foreach($follows as $f)
                 <input name="p_email" type="hidden" value={{$f->p_email}}>
                 <input name="d_email" type="hidden" value={{$f->d_email}}>
                 <input name="id" type="hidden" value={{$f->id}}>
                 @if(session()->has('patient'))
                 <input name="type" type="hidden" value="P">
                 @else
                 <input name="type" type="hidden" value="D">


                 @endif
                 

                 



               @endforeach

               <span style="color: darkblue">Write Message: </span><br>
               
                <textarea name="msg" rows="5" cols="40"></textarea><br><br>
                <label>Upload Image:</label><br>
                <input class="form-control" name="image" type="file" id="image"> <br> <br>
                <input type="submit" class="btn-primary btn-lg" value="Send"><br><br>
    
  
              </form>
              </div>
          
              <div id="display_follows" class="display_follows">
  
                  @foreach($follows as $m)
                  <div class="com">
                  
                  <span>Day, Date and Time: {{\Carbon\Carbon::parse($m->created_at)->toDayDateTimeString()}}</span> <br>
                  @if($m->type == "D")
                  <span>User Email: {{$m->d_email}}</span> <br>
                  @elseif($m->type ==  "P")
                  <span>User Email: {{$m->p_email}}</span> <br>
                  @endif
                 
                  
                  <span>Message: {{$m->message}}</span> <br>
                  @if($m->image != "")
                    <img width='400px' height='300px' src="/{{ $m->image}}" alt="image pic"><br/>
@endif
                  
                  
                  </div><br><br>
  
                  @endforeach
              </div>
  
              <br>
           
  
     
       
         
       </div>
      
  </div>
  <br><br>
  <br>

  
  
  
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