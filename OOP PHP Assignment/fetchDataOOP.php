<?php
$serverName = "localhost";
$UserName = "root";
$Password = "";
$DBname = "eckyprotolabz";

$conn = new mysqli($serverName, $UserName, $Password, $DBname);
if($conn->connect_error)
  {
     die ("Conneciton Failed.!!".$conn->connect_error);
  }

  // order by
//$sql = "SELECT * FROM salary WHERE salary >6500 AND status=1 ";
$sql = "SELECT * FROM salary WHERE salary BETWEEN 3000 AND 7000";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>EmployeeName</th>";
                echo "<th>salary</th>";
                echo "<th>status</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['EmployeeName'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " .$conn->error;
}
 
// Close connection
$conn->close();
?>