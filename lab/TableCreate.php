<?php

$con = mysqli_connect("localhost", "root", "", "fall2020");
 
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE TABLE user(    
    name VARCHAR(25) NOT NULL ,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    ip_address VARCHAR(15) NOT NULL,
    url VARCHAR(50) NOT NULL,
    age INT  NOT NULL,
    gender VARCHAR(10) NOT NULL,
    mobile VARCHAR(15)  NOT NULL,
    comment VARCHAR (500) NOT NULL
)";
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 

?>