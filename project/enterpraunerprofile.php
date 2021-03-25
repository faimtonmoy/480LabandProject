<html>
<head>
<title>Enterprauner Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="a.css">
    
</head>

<body>


<?php
session_start();
$check_auth=$_SESSION['email'];
$connection=mysqli_connect('localhost','root','','agrihelp');
$auth_query="select * from signupenterprauner where email='$check_auth'";
$check_result=mysqli_query($connection, $auth_query);
$count_auth=mysqli_num_rows($check_result);
include('enterprauner_navbar.php');
if($count_auth==0)
{
  echo'Unauthorized Access!! Permission Denied!!!!  <a href="sign_out.php"> Destroy Session </a>';
  exit();
}
else  
{
    

    $auth_query2="select photo from signupenterprauner where email='$check_auth'";
    $check_result2=mysqli_query($connection, $auth_query2);
    while ($row = mysqli_fetch_array($check_result2))
    {
      $ph=$row["photo"];
      
    }
    ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="<?php echo $ph ?>"  height="200" width="200" style="border-radius:60%"><br>
        </div>
        <div class="col-md-6">
          <?php echo '<h3><b>'.$_SESSION["name"].'</b> </h3>';
                echo'<br>';
                echo '<b> Contact Information </b><br>';
                echo $_SESSION["email"];
                echo'<br>';
                echo'<br>';
                echo'<br>';
                ?>
        </div>
      </div>
    </div>
  
    <div class="container"><br><br>
      
        <div class="row">
        <div class= col-md-3></div>
        <div class="col-md-4">
        <?php
    
   

    
              echo '<h4><b>About Me </b><h4>';
              $auth_query1="select bio from signupenterprauner where email='$check_auth'";
              $check_result1=mysqli_query($connection, $auth_query1);

              while ($row = mysqli_fetch_array($check_result1)) {
              $variable1 = $row["bio"];
               echo $variable1;
              }
              
          }   
              

          ?>
        </div>
        </div>
      
    </div>
    


 </body>
</html>