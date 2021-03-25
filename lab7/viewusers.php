<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "webuser");
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM people";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "Users"."<br>";
        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>User Type</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

 
// Close connection
mysqli_close($con);
?>

<html>
<body>
<?php
 if($_SESSION["type"]=="Admin"){
    echo"<a href='Admin.php'> Home </a>";
 } else {
    echo"<a href='User.php'> Home </a>";
 }
 ?>
</body>
</html>
