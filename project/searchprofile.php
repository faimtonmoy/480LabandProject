<html>
<head>
<title>Company Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="a.css">
    
</head>

<body>


<?php
session_start();
$session_email=$_SESSION['email'];
$session_name=$_SESSION['name'];
$connection=mysqli_connect('localhost','root','','agrihelp');

include('home_navbar.php');
if(isset($_GET["data"]) && isset($_GET["data1"]))
    {
        $email = $_GET["data"];
        $type= $_GET["data1"];
        $query="select * from signupcompany, signupexpert, signupenterprauner where email='$email'";
        $result=mysqli_query($connection, $query);
        $count=mysqli_num_rows($result);
        $ans=mysqli_fetch_array($connection, $result);
        $search_name=$ans['name'];
        
        $query2="select photo from signupcompany, signupexpert, signupenterprauner where email='$email'";
        $result2=mysqli_query($connection, $query2);
        $history_query="insert into history (name, email, searchtype, visited_profile) values=('$session_name','$session_email','$type,'$search_name')";
        $result=mysqli_query($connection, $history_query);
        while ($row = mysqli_fetch_array($result2))
        {
            $ph=$row["photo"];
      
        }
    ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="<?php echo $ph ?>"  height="200" width="200" style="border-radius:60%"><br>
        </div>
        <div class="col-md-6">
          <?php echo '<h3><b>'.$ans["name"].'</b> </h3>';
                echo'<br>';
                echo '<b> Contact Information </b><br>';
                echo $ans["email"];
                echo'<br>';
                echo'<br>';
                echo'<br>';
                ?>
        </div>
      </div>
    </div>
  
    <div class="container"><br><br>
      
        <div class="middle">
        <?php
    
   

    
              echo '<h4><b>About Me </b><h4>';
              $auth_query1="select bio from signupcompany, signupexpert, signupenterprauner where email='$email'";
              $check_result1=mysqli_query($connection, $auth_query1);

              while ($row = mysqli_fetch_array($check_result1)) {
              $variable1 = $row["bio"];
               echo $variable1;
              }
        
    }

  
              

          ?>
        </div>
      
    </div>
    


 </body>
</html>