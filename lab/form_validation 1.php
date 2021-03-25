<!DOCTYPE html>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr =$passErr=$addErr=$dErr=$mErr=$urlErr=$comErr= "";
$name = $email = $gender = $comment = $website =$pass = $d=$a=$url=$m="";
$Reg = '[a-z]{2,6}$/i';
$f=0;
$c=0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
   else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]{5,20}$/i",$name)) {
      $nameErr = "Username must be 5-20 chars long"; 
    }
  }


  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
   else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)) {
      $emailErr = "Invalid email format"; 
    }
  }



  if (empty($_POST["pass"])) {
    $passErr = "password is required";
  } 
  else {
    $pass = test_input($_POST["pass"]);
    
    if (!preg_match("/\d/", $pass)) {
         $passErr = "Password should contain at least one number";
          }
          if (!preg_match("/[A-Z]/", $pass)) {
            $passErr = "Password should contain at least one uppercase Letter";
          } 
          if (!preg_match("/[a-z]/", $pass)) {
            $passErr= "Password should contain at least one lowercase Letter";
          }
          if(!preg_match("/\./", $pass)){
            $f=1;
            
          }
          else
          {
            $c++;
          }
          if(!preg_match("/\?/", $pass)){
            $f=1;
          
          }
          else
          {
            $c++;
          }
          if(!preg_match("/\+/", $pass)){
            $f=1;
        
          }
          else
          {
            $c++;
          }
          if(!preg_match("/\*/", $pass)){
            $f=1;
        
          }
          else
          {
            $c++;
          }
        
         if($c==0) 
          {
             $passErr= "Password should contain at least one spec char";
          }
          
  }



if (empty($_POST["a"])) {
    $addErr = "IP adress is required";
  } 
  else {
    $a = test_input($_POST["a"]);

    if (!preg_match("/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/",$a)) {
      $addErr = ""; 
    }
  }



  if (empty($_POST["url"])) {
    $urlErr = "url is required";
  }
   else {
    $url = test_input($_POST["url"]);

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $urlErr = "Use valid url"; 
    }
  }
  


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } 
  else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["m"])) {
    $mErr = "mobile is required";
  } 
  else {
    $m = test_input($_POST["m"]);

    if (!preg_match("/^(8{2})(01)[3456789][0-9]{8}/",$m)) {
      $mErr = "Use valid mobile number"; 
    }
}



if (empty($_POST["d"])) {
    $dErr = "date is required";
  } 
  else {
    $d = $_POST["d"];

 
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($d);
 
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
 
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
 
//Get the difference in years, as we are looking for the user's age.
$age = $difference->y;

$d=$age;
 
}



 if (empty($_POST["comment"])) {
    $comErr = "Please give some info";
  } 
  else {
      $clean= str_replace(array("damn", "bitch", "pissed off"), "***", $comment);
  
    $comment = test_input($_POST["clean"]);
  }
  



if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["a"]) && !empty($_POST["url"]) && !empty($_POST["d"]) && !empty($_POST["gender"]) && !empty($_POST["m"]) && !empty($_POST["comment"])) 
 
 { 


   // Attempt insert query execution


$con = mysqli_connect("localhost", "root", "", "fall2020");  
  
  $sql = "INSERT INTO user(name,email, password, ip_address,url, age, gender,mobile, comment) VALUES ('$name', '$email', '$password', '$ip', '$url', '$date', '$gender', '$mobile', '$comment')";
  
  if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
  } 
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }
   
 }

} 

        
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h2>Form Validation</h2>
<p><span class="error">* required field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<table>


<tr>
  <td> Name: </td>
  <td> <input type="text" name="name" >
  <span class="error">* <?php echo $nameErr;?></span> </td>
</tr>

 
  <tr>
    <td> Email: </td> 
    <td> <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span> </td>
   </tr>

  
  <tr>
     <td> Password:  </td>
     <td> <input type="password" name="pass">
          <span class="error">* <?php echo $passErr;?></span> </td>
   </tr>
          
 

  <tr>
      <td> IP Address: </td> 
      <td> <input type="text" name="a" value="<?php echo $a;?>">
        <span class="error">* <?php echo $addErr;?></span>
      </td>
  </tr>
            
 

  <tr>
      <td> Personal Web URL: </td>
      <td> <input type="text" name="url"  value="<?php echo $url;?>" >
           <span class="error">* <?php echo $urlErr;?></span> </td>
  </tr>
           
  <tr>
    <td>  Date of Birth:  </td>
    <td> <input type="text" name="d" value="<?php echo $d;?>" >
          <span class="error">* <?php echo $dErr;?></span> </td>
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
      <td> <input type="text" name="m" value="<?php echo $m;?>"
            <span class="error">* <?php echo $mErr;?></span> </td>
  </tr>
  

           <tr>
               <td>Brief Info:</td>
               <td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
            </tr>

<tr>
 <td> <input type="submit" name="submit" value="Register"> </td>
 </tr>

 </table>    
</form>



</body>
</html>