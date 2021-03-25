<?php

$con = mysqli_connect("localhost", "root", "", "agrihelp");
 
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE TABLE signupenterprauner(    
    name VARCHAR(25) NOT NULL ,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    confirm_password VARCHAR(20) NOT NULL,
    bio LONGTEXT NOT NULL,
    photo VARCHAR(55) NOT NULL
)";
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 

?>