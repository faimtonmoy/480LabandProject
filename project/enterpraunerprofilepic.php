<?php
 session_start();
 $check_auth=$_SESSION['email'];
 $connection=mysqli_connect('localhost','root','','agrihelp');
 $auth_query="select * from signupenterprauner where email='$check_auth'";
 $check_result=mysqli_query($connection, $auth_query);
$count_auth=mysqli_num_rows($check_result);
if($count_auth==0)
{
  echo'<br>Unauthorized Access!! Permission Denied!!!! <br> <a href="sign_out.php"> Destroy Session </a>';
  exit();
}
 
    if (isset($_POST['submit'])) {
       
        $image = $_FILES['image']['name'];
        $insert= "UPDATE signupenterprauner SET photo='$image' where email='$check_auth'";
        $result = mysqli_query($connection,$insert);
        header('location: enterpraunerprofile.php');
        
    }


    ?>
<html>
<head>
<link rel="stylesheet" href="a.css">

</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
<div class="login-box">
<div class="textbox">
<h1>Profile Picture Upload</h1>
    <i class="fas fa-user"></i>
    
    <input type="file" name="image"/>
    </div>
    <input type="submit" class="btn" name="submit" value="submit" required>

</div>
</form>

</body>
</html>