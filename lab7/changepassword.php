<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "webuser");
$id=$_SESSION['id'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $newpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
    $newconpassword=mysqli_real_escape_string($con,$_POST['conpassword']);
   
$query="UPDATE people SET password='$newpassword', confirm_password='$newconpassword' WHERE id='$id'";
if(mysqli_query($con, $query))
    {
     if($_SESSION["type"]=="Admin"){
            header("location: Admin.php");
         } else {
            header("location: User.php");
         }
}
}
?>  
<html>
<head>

</head>
<body>  

<h2>Change Password</h2>

<form method="post" action="">  
  

  Current Password:<br><input type="password" name="password">
 
  <br>
  New Password:<br><input type="password" name="cpassword">
  
  <br>
  Retype New Password:<br><input type="password" name="conpassword">
<br>
  <input type="submit" name="Change" value="change">
 <?php
 if($_SESSION["type"]=="Admin"){
    echo"<a href='Admin.php'> Home </a>";
 } else {
    echo"<a href='User.php'> Home </a>";
 }
 ?>
</form>
</body>
</html>
