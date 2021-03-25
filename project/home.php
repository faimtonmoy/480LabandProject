<?php 
$connection=mysqli_connect('localhost','root','','agrihelp');
include('home_navbar.php');
session_start();
?>
<html>
<head>
<title>Home Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    
</head>
<body>
    <div class="container">
        <div class="middle">
            <form action="#" method="post">
                    <?php 
                    echo '<b>'.$_SESSION['name'].'</b>'; ?>
                    <input type="textarea" name="userpost" placeholder="what's on your mind?" rows="4" cols="50">
                    
                    <input type="submit" class="btn btn-primary" value="post">
                
            </form>
        </div>
    </div>
    <br><br>
    <div class="container">
    <font color="#003B0D"><h2><b>Posts</b></h2></font>
    </div>
    
    <hr/>


    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userpost = mysqli_real_escape_string($connection,$_POST['userpost']);
    
    $useremail = $_SESSION['email'];
    $username= $_SESSION['name'];
    $type= $_SESSION['type'];
    
    $post_ins_query = "insert into posts(user_email, post,username, type) values('$useremail', '$userpost', '$username', '$type')";
    $result = mysqli_query($connection,$post_ins_query);
    
}

    ?>

    <div class="container">
        <?php 
        
        $post_query= "select * from posts";
        $post_result=mysqli_query($connection, $post_query);
        if(mysqli_num_rows($post_result)>0)
                    { 
                      while($ans=mysqli_fetch_array($post_result))
                        {   
                            echo '<b>'.$ans['username'].'</b> <font color="green"> posted, </font> <br>';
                            echo '['.$ans['type'].'] <br>';
                            echo $ans['post'];
                            if($_SESSION['email']==$ans['user_email'])
                            {
                                echo'<form action="postdeleteprocess.php" method="post">
                                <input type="hidden" name="p_id" value="'.$ans['post_id'].'">
                                <input type="submit" class="btn btn-danger" value="Delete Post"> </form>';
                            }
                            
                            $comment_query="select * from comments where post_id={$ans['post_id']}";
                            $comment_result=mysqli_query($connection, $comment_query);
                            echo '<br>';
                            echo '<div class="row"> <div class="col-md-1"> </div> <div class="col-md-11">';
                            if(mysqli_num_rows($comment_result)>0)
                                { 
                                    while($c_ans=mysqli_fetch_array($comment_result))
                                    {
                                        echo '<b>'.$c_ans['username'].'</b> <font color="green">commented, </font>';
                                        echo $c_ans['comment'];
                                        if($_SESSION['email']==$c_ans['user_email'])
                                        {
                                            echo'<form action="commentdeleteprocess.php" method="post">
                                            <input type="hidden" name="c_id" value="'.$c_ans['comment_id'].'">
                                            <input type="submit" class="btn btn-danger" value="Delete Comment"> </form>';
                                        }
                                        echo '<br>';

                                        
                                    }
                                    
                                }
                                echo' 
                                    
                                    <form action="comment_process.php" method="post">';
                                    
                                    echo '<b>'.$_SESSION['name'].'</b>';
                                    echo  '<input type="textarea" name="usercomment" placeholder="Make a comment" rows="4" cols="50"> 
                                    <input type="hidden" name="post_c_id" value="'.$ans['post_id'].'"class="btn btn-primary" value="post"> 
                                    <input type="submit" class="btn btn-success" value="Comment">
                                    
                                    </form>
                                    ';
                                    
                                echo '</div> </div>';
                            echo '<br> <br> <hr/>';
                        }
                    }
        
        ?>
    </div>
</body>
</html>
