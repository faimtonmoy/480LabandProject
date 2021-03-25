<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "webuser");
echo"<h1>Welcome ". $_SESSION["name"]." !</h1>";
echo"<a href='profile.php'> Profile </a>";
echo"<br>";
echo"<a href='changepassword.php'> Change Password </a>";
echo"<br>";
echo"<a href='sign_out.php'> Log Out </a>";

?>
