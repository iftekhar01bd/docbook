<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocBook: Consultation</title>
<!--    ------css link---------->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <link rel="stylesheet" href="/css/consul.css">
    
    
    <script>

      window.onload = function loadit() {
          var problem = $("#problemtype").children("option:selected").val();
          var x = $(this).children("option:selected").val();
          
         

          if(x == "Uncategorized"){
            $('#msg').text('Message -> Write about your unknown problem.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');

          }

           
                
             
          else if(x == "Mental Health"){

            $('#msg').text('Message -> Write your problem in details.');

            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');


          }

          else if(x == "Romantic Relationship"){
            $('#msg').text('Message -> Please write your emotional feelings and attraction related problem in details.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');

            
          }

          else if(x == "Fitness"){
            $('#msg').text('Message -> Please post exercise related queries.');

            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
          }

          else if(x == "Nutrition"){
            $('#msg').text('Message -> Please post diet related queries.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
          }

          else if(x == "Mens Health"){
            $('#msg').text('Message -> Please post Male related health issues.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
          }

          else if(x == "Womens Health"){
            $('#msg').text('Message -> Please post female related health issues.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
          }

          else if(x == "Pregnancy"){
            $('#msg').text('Message -> Please post pregnancy related queries free of cost.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');

          }

          else if(x == "Ear Nose Throat"){
            $('#msg').text('Message -> Please post your Ear Nose Throat realted issues.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
          }

          else if(x == "Skin"){
            $('#msg').text('Message -> Please post your urology related issues.');

            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
          }
          else if(x == "Urology"){
            $('#msg').text('Message ->  Please post your urology related issues.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
          }
          else if(x == "Child Care"){
            $('#msg').text('Message -> Please post your pediatrics realted issues.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post With Name</option>');
          }

          else if(x == "Sex Education"){
            $('#msg').text('Message -> Make post to learn and improve about your sexual wellbeing.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
          }

          else if(x == "Gynecology"){
            $('#msg').text('Message -> Please post your gyneacology realted problems.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            
          }
          else if(x == "Family Planning"){
            $('#msg').text('Message -> Get consultation regarding family planning{anonoymous or identified.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post Anonymously</option>');
            $('#posttype').append('<option>Post With Name</option>');
            
          }
          else if(x == "Menstruation"){
            $('#msg').text('Message -> Please post about your menstruation realted queires');
            $('#posttype').append('<option>Post Anonymously</option>');
            
          }
          else if(x == "Respiratory"){
            $('#msg').text('Message -> Post your respiratory related issues.');
            $('#posttype').empty();
            $('#posttype').append('<option>Post With Name</option>');
            
          }
          
          

          else{

          }

      }
          
     
  </script>
    
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
  
  
  
  







<!--------------section--2---------->
<form action="post_issue" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container">
    <div class="patient-post-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <div class="row">
                       <div class="row">
                           <div class="row-md-12">
                              <div class="row">
                                 <h3 href="#" style="color: darkblue; font-weight: bold; ">Trending Topics</h3><br>
                                 
                                 
                                 
                                  
                              </div> 
                           </div>
                           <div class="col-md-12">
                              <div class="rateWhole">
                                <p><a class="covBtn" href="http://103.247.238.92/webportal/pages/covid19.php?fbclid=IwAR28SOoRXiL52-ysVyRcXh6kYg9c9KHn5AK82iRvsYxqUt1NZ52Tc6iLIXE" target="blank">Covid-19  Update</a></p> 
                                 <p><a class="covBtn" href="#">Top Doctors</a></p> 
                                 @foreach($rated_docs as $r)

                                 <div class="rateBox">
                                   <div class="rateName">
                                    <img width='50px' height='50px' src={{ "/".$r->propic }} alt="pic">
                                    <p>{{$r->fname}} {{$r->lname}}</p> <br>
                                   </div>
                                 <div class="rate">
                                  <p>Rating: {{$r->rating}}</p>
                                </div>
                                  

                                 </div><br>

                                 @endforeach
                                 
                            
                                 
                                  
                              </div> 
                           </div>
                           <div class="col-md-12">
                              <div class="container">
                                 <p><a class="covBtn" href="{{route('home')}}">Doctors Posts</a></p> 
                            
                                 
                                  
                              </div> 
                           </div>
                           
                      
                        <div class="col-md-12">
                            <div class="container">
                            <p><a class="covBtn" href="{{ route('view_prescriptions') }}">Medical History</a></p>
                        </div>
                        </div>
                 
                       
                          
                         
                          
                          
                          
                  
                        
                           
                           
                       </div>
                   </div>   
                </div>
               
                 <div class="col-md-7">
              <div class="patient-post-middle">
                <select class="form-select" name="posttype" id="posttype">
                    <option>Post Anonymously</option>
                    <option>Post With Name</option>
                    
                </select><br>
                      <div class="problem-type-select">
                      
                      <div class="problem-type">
                          <p>Problem type</p>
                          <select id="problemtype" name="problemtype" class="form-select">
  <option value="Uncategorized">Uncategorized</option>
  <option value="Mental Health">Mental Health</option>
  <option value="Romantic Relationship">Romantic Relationship</option>
  <option value="Fitness">Fitness</option>
  <option value="Nutrition">Nutrition</option>
  <option value="Mens Health">Men's Health</option>
  <option value="Womens Health">Women's Health</option>
  <option value="Pregnancy">Pregnancy</option>
  <option value="Ear Noise Throat">Ear Noise Throat</option>
  <option value="Skin">Skin</option>
  <option value="Urology">Urology</option>
  <option value="Child Care">Child Care</option>
  <option value="Sex Education">Sex Education</option>
  <option value="Gynecology">Gynecology</option>
  <option value="Family Planning">Family Planning</option>
  <option value="Menstruation">Menstruation</option>
  <option value="Respiratory">Respiratory</option>





</select>
                      </div>
                      
                      
                  </div>
                  <div class="post-submit">
                    <div class="container">
                      
                      <label style="color:red; font-size: 20px;" name="msg" id="msg">
                        <label>Message -> </label>
                        Write about your unknown problem.
                      </label><br><br>

                    </div>
                         
                          <div class="form-floating">
                            
  <textarea class="form-control" maxlength = "1000" placeholder="Details.." name="details" id="details" style="height: 200px"></textarea>
  
</div>
                      
                      </div>
      <div class="gender-age">
          <div class="gender">

          </div>
         
      </div>  
      <div class="file-upload">
          <div class="mb-3">
<!--  <label for="formFile" class="form-label">Default file input example</label>-->
  <label>Upload Image:</label>
  <input class="form-control" name="post_img" type="file" id="post_img"> <br> <br>
  <label>Upload PDF:</label>
  <input class="form-control" name="pdf" type="file" id="pdf"> <br>
</div>

<input type="hidden" class='form-control' name='email' id="email" value={{session('patient')}}>


<!--  <label for="formFile" class="form-label">Default file input example</label>-->


      
      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
      @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
      <div class="container">
        <input class="btn-primary btn-large" type="submit" value="   Post   ">
      </div>
        
      
        </form>              
     
                      
              </div>
          </div>  
 

     </div>          
               
               
               
               
               
                
            </div>
            
         
            
            
        </div>
    </div>
</div>

















<!--------section-5-footer----->
<div class="container-fluid p-0">
    <div class="footer">
        <div class="container">
            <div class="row text-center" style="padding: 18px 0px;">
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



















<script>

$(document).ready(function(){
       
  
       $("#problemtype").change(function(){
           var x = $(this).children("option:selected").val();
           if(x == "Uncategorized"){
             $('#msg').text('Message -> Write about your unknown problem.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
 
           }
 
            
                 
              
           else if(x == "Mental Health"){
 
             $('#msg').text('Message -> Write your problem in details.');
 
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
 
 
           }
 
           else if(x == "Romantic Relationship"){
             $('#msg').text('Message -> Please write your emotional feelings and attraction related problem in details.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
 
             
            
 
             
           }
 
           else if(x == "Fitness"){
             $('#msg').text('Message -> Please post exercise related queries.');
 
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
 
           else if(x == "Nutrition"){
             $('#msg').text('Message -> Please post diet related queries.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
 
           else if(x == "Mens Health"){
             $('#msg').text('Message -> Please post Male related health issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
 
           else if(x == "Womens Health"){
             $('#msg').text('Message -> Please post female related health issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
 
           else if(x == "Pregnancy"){
             $('#msg').text('Message -> Please post pregnancy related queries free of cost.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
 
           }
 
           else if(x == "Ear Nose Throat"){
             $('#msg').text('Message -> Please post your Ear Nose Throat realted issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
 
           else if(x == "Skin"){
             $('#msg').text('Message -> Please post your skin related issues.');
 
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
           else if(x == "Urology"){
             $('#msg').text('Message ->  Please post your urology related issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             
            
           }
           else if(x == "Child Care"){
             $('#msg').text('Message -> Please post your pediatrics realted issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
 
           else if(x == "Sex Education"){
             $('#msg').text('Message -> Make post to learn and improve about your sexual wellbeing.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             
            
           }
 
           else if(x == "Gynecology"){
             $('#msg').text('Message -> Please post your gyneacology realted problems.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             
            
           }
           else if(x == "Family Planning"){
             $('#msg').text('Message -> Get consultation regarding family planning{anonoymous or identified.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post Anonymously</option>');
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }
           else if(x == "Menstruation"){
             $('#msg').text('Message -> Please post about your menstruation realted queires');
 
             $('#posttype').append('<option>Post Anonymously</option>');
             
            
           }
           else if(x == "Respiratory"){
 
             
             $('#msg').text('Message -> Post your respiratory related issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post With Name</option>');
             
            
           }else if(x == "Ear Noise Throat"){
              
            $('#msg').text('Message -> Post your ear, noise and throat related issues.');
             $('#posttype').empty();
             $('#posttype').append('<option>Post With Name</option>');
             $('#posttype').append('<option>Post Anonymously</option>');
           }
           
          
 
           else{
            
 
           }
           
       });
   });
  </script>
<!-----------bootstrap js link------------->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>