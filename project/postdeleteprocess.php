<?php
session_start();
$connection=mysqli_connect('localhost','root','','agrihelp');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $p_id=mysqli_real_escape_string($connection, $_POST['p_id']);
    $query="delete from posts where post_id='$p_id'";
    $result=mysqli_query($connection, $query);
    if($result)
    {
        header('location: home.php');
    }
}


?>