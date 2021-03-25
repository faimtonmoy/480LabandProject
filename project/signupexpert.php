<?php
  session_start();

  $connection=mysqli_connect("localhost","root","","agrihelp");
 
  $emailerr=$passworderr="";
  $password=$email="";
  
  if(isset($_POST['submit']))
  {
    $name= $_POST["fname"]." ".$_POST["lname"];
    $name=mysqli_real_escape_string($connection,$name);
    $email1=$_POST['email'];
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i",$email1))
    {
        $emailerr = "Invalid email format"; 
    }
    else{
        $email=mysqli_real_escape_string($connection,$email1);
    }
    $pass= $_POST['password'];
    if (!preg_match("/^[a-zA-Z0-9]{8,20}$/i",$pass))
    {
        $passworderr="Password must be 8-20 character's long, special character is not valid";
    }
    else
    {
        $password=mysqli_real_escape_string($connection,$pass);
    }
    
    
    $conpassword=mysqli_real_escape_string($connection,$_POST['conpassword']);
    $bio=mysqli_real_escape_string($connection,$_POST['bio']);
    $dob=mysqli_real_escape_string($connection,$_POST['dob']);
    $query="SELECT * FROM signupexpert where email='".$email."'";
    $result = mysqli_query($connection,$query);
    $num_rows = mysqli_num_rows($result);
    if($num_rows>1)
    {
       echo "Email Already Exists";
    }
    else{
    if($password===$conpassword)
     {
        $insert= "INSERT into signupexpert (name, email, password, confirm_password, DOB, bio) VALUES('$name','$email','$password','$conpassword', '$dob', '$bio')";
        if(mysqli_query($connection, $insert))
        {
            $_SESSION['name'] = $name;
            $_SESSION['email']= $email;
            $_SESSION['type'] = "Expert";
            header('location: expertprofilepic.php');

        }
        else
         {
          echo "ERROR: Could not able to execute $insert. " . mysqli_error($connection);
          }
    }
    else
    {
        echo "Passwords do not match" ;
    }
}
  }
mysqli_close($connection);

?>
<html>
<head>
<link rel="stylesheet" href="a.css">

</head>
<body>
<form method="POST" action="" >
<div class="login-box">
  <h1>Sign Up</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
<label> First Name:
<input type="text" name="fname" required>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> Last Name:
<input type="text" name="lname" required>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> Email:
<input type="text" name="email" required>
<?php echo $emailerr;?>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-lock"></i>
<label> Password:
<input type= "pasword" name="password" required>
<?php echo $passworderr;?>
</label> 
</div>
<div class="textbox">
    <i class="fas fa-lock"></i>
<label> Confirm Password:
<input type= "pasword" name="conpassword" required>
</label>
</div>
<div class="textbox">
    <i class="fas fa-calender"></i>
<label> Date of Birth:
<input type= "date" name="dob" required>
</label>
</div>
<div class="textbox">
    <i class="fas fa-user"></i>
<label> About Yourself:
<input type= "textarea" name="bio" required>
</label> </div>


<input type="submit" class="btn" name="submit" value="submit" required>
</div>
</form>
</body>
</html>

