<?php
session_start();
$connection=mysqli_connect('localhost','root','','agrihelp'); 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $comment = mysqli_real_escape_string($connection,$_POST['usercomment']);
    $post_id= mysqli_real_escape_string($connection, $_POST['post_c_id']);
    $useremail = $_SESSION['email'];
    $username= $_SESSION['name'];
   
    $comment_ins_query=  "insert into comments(post_id, user_email, username, comment) values('$post_id', '$useremail', '$username', '$comment')";
    $result2 = mysqli_query($connection,$comment_ins_query);
}
header('location: home.php');


?>