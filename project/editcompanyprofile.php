<?php
session_start();
$check_auth=$_SESSION['email'];
$connection=mysqli_connect('localhost','root','','agrihelp');
include('signupin_navbar.php');
$auth_query="select * from signupcompany where email='$check_auth'";
$check_result=mysqli_query($connection, $auth_query);
$count_auth=mysqli_num_rows($check_result);
if($count_auth==0)
{
  echo'<br>Unauthorized Access!! Permission Denied!!!! <br> <a href="sign_out.php"> Destroy Session </a>';
  exit();
}
date_default_timezone_set("Asia/Dhaka");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $connection=mysqli_connect('localhost', 'root', '', 'agrihelp');
    $newname= $_POST["fname"]." ".$_POST["lname"];
    $newname=mysqli_real_escape_string($connection,$newname);
    $newemail=mysqli_real_escape_string($connection,$_POST['email']);
    $newpassword=mysqli_real_escape_string($connection,$_POST['password']);
    $newconpassword=mysqli_real_escape_string($connection,$_POST['conpassword']);
    $newproduct=mysqli_real_escape_string($connection,$_POST['product']);
    
    $query="update signupcompany set name='$newname', email='$newemail', password='$newpassword', confirm_password='$newconpassword', product='$newproduct' where email='$check_auth'";
    
    if(mysqli_query($connection, $query))
    {
        $_SESSION['name'] = $newname;
        $_SESSION['email']= $newemail;
        header('location: companyprofile.php');

    }
}
?>
<html>
<head>
<title> Edit Profile </title>
</head>
<body>
<form method="POST" action="">
<label> Edit First Name:
<input type="text" name="fname" required>
</label> <br>
<label> Edit Last Name:
<input type="text" name="lname" required>
</label> <br>
<label> Edit Email:
<input type="text" name="email" required>
</label> <br>
<label> Edit Password:
<input type= "pasword" name="password" required>
</label> <br>
<label> Confirm Password:
<input type= "pasword" name="conpassword" required>
</label><br>

<label> Edit Products:
<input type= "text" name="prouct" required>
</label> <br>
<input type="submit" name="submit" value="submit" required>
</form>
</body>
</html>