<?php
$connection=mysqli_connect('localhost','root','','agrihelp');
include('signupin_navbar.php');
?>
<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/custom.css">
   
 </head>

 <body style="margin-bottom: 100px;">
  <div class="container">
      <div class="row">
        <img src="photo.jpg" height="400px" alt="">
        >
        <div class="col-md-4">
            <h1><b>On purpose of Agricultural Development</b></h1>
            <p>Represent your company. Lets think more about a clean startup! <br> Get help from verified experts...
          </p>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-4">
          <div class="middle">
            <img src="com.jpg" height="200px" alt="">
              <h5><b>Company</b></h5>
              
          </div>
        </div>
        <div class="col-md-4">
          <div class="middle">
            <img src="entr.jpg" height="200px" alt="">
                  <h5><b>Entrepreneur</b></h5>
                  
          </div>
        </div>
        <div class="col-md-4">
          <div class="middle">
            <img src="expert.jpg" height="200px" alt="">
                  <h5><b> Expert</b></h5>
                  
          </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-4">
          <div class="middle">
            <a href="signupcompany.php" class="btn btn-primary">Sign Up</a>
            <a href="signincompany.php" class="btn btn-success">Sign In</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="middle">
          <a href="signupenterprauner.php" class="btn btn-primary">Sign Up</a>
            <a href="signinenterprauner.php" class="btn btn-success">Sign In</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="middle">
          <a href="signupexpert.php" class="btn btn-primary">Sign Up</a>
            <a href="signinexpert.php" class="btn btn-success">Sign In</a>
          </div>
        </div>
    </div>
  </div>

 </body>
 </html>

