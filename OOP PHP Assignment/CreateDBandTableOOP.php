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

//begginning of New SQL Table
	$sql = "CREATE TABLE salary(id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, EmployeeName VARCHAR(20) NOT NULL, salary VARCHAR(20) NOT NULL, status INT(5) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
	if($conn->query($sql)=== TRUE)
	{
		echo "TABLE WAS CREATED SUCCESSFULLY!";
		
	}
	else
		{
			echo "WE HAVE ERROR IN CREATING TABLE". $conn->error;
		}
	

$conn->close();
?>