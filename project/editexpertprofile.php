<?php
session_start();
$check_auth=$_SESSION['email'];
$connection=mysqli_connect('localhost','root','','agrihelp');
$auth_query="select * from signupexpert where email='$check_auth'";
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
    $newspeciality=mysqli_real_escape_string($connection,$_POST['special']);
    $newdob=mysqli_real_escape_string($connection,$_POST['dob']);
    $query="update signupexpert set name='$newname', email='$newemail', password='$newpassword', confirm_password='$newconpassword', dob='$newdob', Speciality='$newspeciality' where email='$check_auth'";
    
    if(mysqli_query($connection, $query))
    {
        $_SESSION['name'] = $newname;
        $_SESSION['email']= $newemail;
        header('location: expertprofile.php');

    }
}
?>
<html>
<head>
<link rel="stylesheet" href="a.css">
</head>
<body>
<form method="POST" action="">
<div class="login-box">
  <h1>Edit Profile</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
<label> Edit First Name:
<input type="text" name="fname" required>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> Edit Last Name:
<input type="text" name="lname" required>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> Edit Email:
<input type="text" name="email" required>
</label>
</div>
<div class="textbox">
    <i class="fas fa-lock"></i>
<label> Edit Password:
<input type= "pasword" name="password" required>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-lock"></i>
<label> Confirm Password:
<input type= "pasword" name="conpassword" required>
</label>
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> Edit Date of Birth:
<input type= "date" name="dob" required>
</label>
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> Edit Speciality:
<input type= "text" name="special" required>
</label> </div>
<input type="submit" class="btn" name="submit" value="submit" required>
</form>
</body>
</html>