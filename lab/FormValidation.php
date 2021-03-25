<html>
<head>
<style>
.error{
    color: red;
}
</style>
</head>
<body>

<?php 

 $fnameErr=$mnameErr=$lnameErr=$dateErr=$passwordErr=$emailErr=$ipErr=$urlErr=$genderErr=$commentErr=$mobileErr=$nameErr="";
 $fname=$mname=$lname=$date=$password=$email=$ip=$url=$gender=$comment=$mobile=$name="";
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
     if(empty($_POST["fname"])){
         $fnameErr= "First Name is Required";
     }
     if(empty($_POST["lname"])){
        $fnameErr= "Last Name is Required";
    }
    else
    {

        $name= $_POST["fname"]." ".$_POST["mname"]." ".$_POST["lname"];
        $name = test_input($name);
        $regex="/\s\s+/";
        $clean= preg_replace($regex,' ',$name);
        $name=$clean;
        if (!preg_match("/^[a-zA-Z ]{4,25}$/i",$name)) {
            $nameErr = "Username must be 4-25 chars long"; 
          }


    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      }
       else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i",$email)) {
          $emailErr = "Invalid email format"; 
        }
      }
      if (empty($_POST["password"])) {
        $passwordErr = "password is required";
      } 
      else {
        $password = test_input($_POST["password"]);
        
        if (!preg_match("/^[a-zA-Z0-9]{8,20}$/i",$password))
        {
            $passwordErr="Password must be 8-20 character's long, special character is not valid";
        }
              
 }
 if (empty($_POST["ip"])) {
    $ipErr = "IP adress is required";
  } 
  else {
    $ip = test_input($_POST["ip"]);

    if (!preg_match("/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/",$ip)) {
      $ipErr = "ip is not valid"; 
    }
  }
  if (empty($_POST["url"])) {
    $urlErr = "url is required";
  }
   else {
    $url = test_input($_POST["url"]);

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $urlErr = "url is not valid"; 
    }
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } 
  else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["mobile"])) {
    $mobileErr = "Mobile is required";
  } 
  else {
    $mobile = test_input($_POST["mobile"]);

    if (!preg_match("/^(\+)(8{2})(01)[3-9][0-9]{8}/",$mobile)) {
      $mobileErr = "Use a valid mobile number"; 
    }
}
if (empty($_POST["date"])) {
  $dateErr = "date is required";
} 
else {
  $date = $_POST["date"];
}
$bday = new DateTime($date);
$today = new DateTime();
$diff = $today->diff($bday);
$date= $diff->y;


if (empty($_POST["comment"])) {
  $comErr = "Please give some info";
} 
else
{
  $comment = test_input($_POST["comment"]);

}
$con = mysqli_connect("localhost", "root", "", "fall2020");  
  
  $sql = "INSERT INTO user(name,email, password, ip_address,url, age, gender,mobile, comment) VALUES ('$name', '$email', '$password', '$ip', '$url', '$date', '$gender', '$mobile', '$comment')";
  
  if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
  } 
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }
   
 



 }

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table>


<tr>
  <td> First Name: </td>
  <td> <input type="text" name="fname" >
  <span class="error">* <?php echo $fnameErr;?></span> </td>
</tr>
<tr>
  <td> Middle Name: </td>
  <td> <input type="text" name="mname" >
  <span class="error"> <?php echo $mnameErr;?></span> </td>
</tr>
<tr>
  <td> Last Name: </td>
  <td> <input type="text" name="lname" >
  <span class="error">* <?php echo $lnameErr;?></span> </td>
</tr>

 
  <tr>
    <td> Email: </td> 
    <td> <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span> </td>
   </tr>

  
  <tr>
     <td> Password:  </td>
     <td> <input type="password" name="password">
          <span class="error">* <?php echo $passwordErr;?></span> </td>
   </tr>
          
 

  <tr>
      <td> IP Address: </td> 
      <td> <input type="text" name="ip">
        <span class="error">* <?php echo $ipErr;?></span>
      </td>
  </tr>
            
 

  <tr>
      <td> Personal Web URL: </td>
      <td> <input type="text" name="url" >
           <span class="error">* <?php echo $urlErr;?></span> </td>
  </tr>
           
  <tr>
    <td>  Date of Birth:  </td>
    <td> <input type="text" name="date" >
          <span class="error">* <?php echo $dateErr;?></span> </td>
  </tr>
          
 
 <tr>
    <td> Gender: </td>
    <td> <input type="radio" name="gender" value="female">Female
         <input type="radio" name="gender" value="male">Male
         <input type="radio" name="gender" value="other">Other  
        <span class="error">* <?php echo $genderErr;?></span> </td>
  </tr>
        

  <tr>
      <td>  Mobile Number: </td>
      <td> <input type="text" name="mobile">
            <span class="error">* <?php echo $mobileErr;?></span> </td>
  </tr>
  

           <tr>
               <td>Brief Info:</td>
               <td> <textarea name = "comment" rows = "3" cols = "20"></textarea></td>
            </tr>

<tr>
 <td> <input type="submit" name="submit" value="Register"> </td>
 </tr>

 </table>    
</form>

</body>
</html>