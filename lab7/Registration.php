<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "webuser");
 
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
   { 
        if (empty($_POST["id"])) {
            echo "ID is required";
          } else {
            if(!preg_match("/^(\d){4}[\-](\d){1}[\-](\d){2}[\-](\d){3}$/", $_POST["id"])){
               echo "Enter valid id";
            }
            else{
              $id= mysqli_real_escape_string($con,$_POST["id"]);
            }
          }
          if (empty($_POST["name"])) {
             echo "Name is required";
          } 
           else {
            if (!preg_match("/^[a-zA-Z ]{5,20}$/i",$_POST["name"])) {
              echo "put a valid name";
          }
          else{
            $name= mysqli_real_escape_string($con,$_POST["name"]);
          }
        }
        if (empty($_POST["email"])) {
            echo "Email is required";
          }
           else {
          
            if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST["email"])) {
              echo "Invalid email format"; 
            }
            else
            {
                $email= mysqli_real_escape_string($con,$_POST["email"]);
            }
          }
    $pass= $_POST['password'];
    if (!preg_match("/^[a-zA-Z0-9]{8,20}$/i",$pass))
    {
        echo"Password must be 8-20 character's long, special character is not valid";
    }
    else
    {
        $password=mysqli_real_escape_string($con,$pass);
    }  
    $conpassword=mysqli_real_escape_string($con,$_POST['conpassword']);  
    $t= $_POST["user_type"];
    $type=mysqli_real_escape_string($con,$t);
    if($password===$conpassword)
    {
        $insert= "INSERT into people (id,name, email, password, confirm_password, type) VALUES('$id','$name','$email','$password','$conpassword','$type')";
    }
    if(mysqli_query($con, $insert))
    {
        header("location: Log_in.php");
    }
    else
         {
          echo "ERROR: Could not able to execute $insert. " . mysqli_error($con);
          }
    
 
mysqli_close($con);
   }


?>
<html>
<head>
</head>
<body>
<h2>Registration</h2>
<form method="post" action="">  
  
  Id:<br><input type="text" name="id" required>
  <br>
  Password:<br><input type="password" name="password" required>
  <br>
  Confirm Password:<br><input type="password" name="conpassword" required>
  <br>
  Name:<br><input type="text" name="name" required>
  
  <br>
  Email:<br><input type="email" name="email" required>
  
  <br>
  User Type:<br>
  <select name="user_type">
    <option value="User">User</option>
    <option value="Admin">Admin</option>
  </select><br>

  <input type="submit" name="submit" value="Register" onclick="login_form.php">
  <input type="button" value="Login" onclick="login_form.php">
</form>

</body>
</html>