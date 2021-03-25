<html>
<head><title>Search</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    


<?php

session_start();
include('home_navbar.php');
$connection=mysqli_connect('localhost','root','','agrihelp');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $search= mysqli_real_escape_string($connection, $_POST['search']);
    if($search=="expert" || $search=="Expert" || $search=="EXPERT"){
        $query="select name, email from signupexpert";
        $type="expert";
        $result=mysqli_query($connection,$query);
        echo'<div class= "container">
        <div class="middle">';
        if(mysqli_num_rows($result)>0)
        { 
          while($ans=mysqli_fetch_array($result))
          {
              
                echo $ans['name'];
                echo "</br>";
          }
        }
        echo '</div> 
        </div>';
    }

    else if($search=="company" || $search=="Company" || $search=="COMPANY"){
        $query2="select name, email from signupcompany";
        $type="company";
        $result2=mysqli_query($connection, $query2);
        echo'<div class= "container">
        <div class="middle">';
        if(mysqli_num_rows($result2)>0)
        { 
          while($ans2=mysqli_fetch_array($result2))
          {
                echo $ans2['name'];
          }
        }
        echo '</div> 
        </div>';
    }

    else if($search=="entrepreneur" || $search=="Entrepreneur" || $search=="ENTREPRENEUR"){
        $query3="select name, email from signupenterprauner";
        $type="entrepreneur";
        $result3=mysqli_query($connection, $query3);
        echo'<div class= "container">
        <div class="middle">';
        if(mysqli_num_rows($result3)>0)
        { 
          while($ans3=mysqli_fetch_array($result3))
          {
                echo $ans3['name'];
          }
        }
        echo '</div> 
        </div>';
    }

    else{
        echo'<div class= "container">
        <div class="middle">
        <p> Invalid Search!!! Go back to <b> <a href="home.php">Home Page </a> </b> </P> 
        </div> 
        </div>';
    }
}

?>


</body>
</html>