<?php

$con = mysqli_connect("localhost", "root", "", "agrihelp");
 
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql =CREATE TABLE posts ( post_id INT(11) NOT NULL AUTO_INCREMENT ,
                         user_email VARCHAR(55) NOT NULL , 
                         post LONGTEXT NOT NULL ,
                         username VARCHAR(20) NOT NULL ,
                         type VARCHAR(10) NOT NULL , 
                         PRIMARY KEY (post_id));
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 

?>