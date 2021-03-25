<?php
session_start();
$connection=mysqli_connect('localhost','root','','agrihelp');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $c_id=mysqli_real_escape_string($connection, $_POST['c_id']);
    $query="delete from comments where comment_id='$c_id'";
    $result=mysqli_query($connection, $query);
    if($result)
    {
        header('location: home.php');
    }
}


?>