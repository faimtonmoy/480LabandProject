<?php
 session_start();
 $connection=mysqli_connect('localhost','root','','agrihelp');
 include('signupin_navbar.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $query = "SELECT name, email FROM signupexpert WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['type'] = "Expert";
        $remember=$_POST['remember'];

        if(isset($_POST['remember']))
        {
            setcookie('email', $email, time()+60*3);
        }
        header('location: expertprofile.php');
    }
    else
    {
        echo "Email or Password is invalid.";
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
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
<label> Email
<input type="email" name="email" required>
</label>
</div>
<br>
<div class="textbox">
    <i class="fas fa-lock"></i>
<label> Password
<input type="password" name="password" required>
</label>
</div>
<input type="submit" class="btn" name="submit" value="Sign In">
</div>
</form>
</body>
</html>
