<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "webuser");
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    $user = mysqli_real_escape_string($con,$_POST['id']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

      if(isset($_POST['remember'])){
          setcookie("id",$user, time()+3600*24);
          
      }
      $sql = "SELECT id,name,type FROM people WHERE id = '$user' and password = '$password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) 
      {
        $_SESSION['name'] = $row['name'];
        $_SESSION['type'] = $row['type'];
        $_SESSION['id'] = $row['id'];

         if($_SESSION['type']=="Admin"){
            header("location: admin.php");
         } else {
            header("location: user.php");
         }
      }
      else{
          echo "wrong id";
      }
    }

?>

<html>
<head>

</head>
<body> 

<h2>LOGIN</h2>
<form method="post" action="">
	User ID:<br>
	<input type="text" name="id"><br>
	Password:<br>
	<input type="password" name="password">
	<br><br>
	<input type="checkbox" value="remember" name="remember">Remember Me<br>
	
	<input type="submit" name="submit" value="Login">
  	<input type="button" value="Register" onclick="Register.php"> 
</form>
</body>
</html>