<?php
$con = mysqli_connect("localhost", "root", "", "fall2020");
if(!$con){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $sql = "SELECT * FROM user ORDER BY 'name' ASC";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Password</th>";
                echo "<th>IP Address</th>";
                echo "<th>URL</th>";
                echo "<th>Age</th>";
                echo "<th>Gender</th>";
                echo "<th>Mobile</th>";
                echo "<th>Comment</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['ip_address'] . "</td>";
                echo "<td>" . $row['url'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['comment'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 

 

?>