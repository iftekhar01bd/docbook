<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcome to DocBook</title>
    <!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous"></script>
<!--    ------css link---------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/welcome.css">
</head>
<body>
<!---------section-1---------->
<!------top-heading------>


    
    
    

<div class="container">
  <div class="logo">
      <img src="images/logofin.png" alt="LOGO" width="160px" height="60px">

  </div>

  <div class="right_container">
      <div class="top">
          <span></span>
          <span style="font-weight: bold;">Email:</span><span> docbook@gmail.com</span>
          <span style="color: red;">Emergency Call:</span><span style="font-weight: bold;"> +09992392939239</span>
          <button onclick="window.location='{{ url("/login") }}'" class="btn btn-primary btn-lg">Join</button>

      </div>
      <div class="bottom">
          <span>Home</span>
          <span>Services</span>
          <span>News Feed</span>
          <span>About</span>

      </div>
  </div>
</div>

 

     
  


<!--------------section--2---------->
<div class="container-fluid p-0">
<div class="section-2" style="background: url(images/background.jpg) rgba(70, 128, 214, 0.5);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
              <div class="doc-image">
                  <img src="images/doctorleft.png" alt="doctor image">
              </div>  
            </div>
             <div class="col-md-6">
              <div class="hospital-des">
                  <h4>Find Nearest Hospitals</h4>
                  <h1>Emergency?</h1>
                  <h4>Get Immidiate Consultation</h4>
                  <div class="d-grid gap-2 d-md-block">
                    <button onclick="window.location='{{ url("/login") }}'" class="btn btn-primary btn-lg">Join Us</button>
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

</body>
</html>