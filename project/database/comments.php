<?php

$con = mysqli_connect("localhost", "root", "", "agrihelp");
 
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = CREATE TABLE comments ( post_id INT(11) NOT NULL ,
                               user_email VARCHAR(55) NOT NULL ,
                               user_name VARCHAR(30) NOT NULL , 
                               comment LONGTEXT NOT NULL ,
                               comment_id INT(11) NOT NULL AUTO_INCREMENT ,
                               PRIMARY KEY (comment_id));
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 

?>