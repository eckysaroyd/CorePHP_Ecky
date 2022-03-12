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

  $data  = "INSERT INTO salary(EmployeeName,salary,status)VALUES('ABC',5000,0);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('DEF',10000,1);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('HIJ',8000,1);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('KLM',7500,1);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('NPQ',6500,0);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('RST',5500,1);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('UVW',9000,1);";
  $data .= "INSERT INTO salary(EmployeeName,salary,status)VALUES('XYZ',2000,0)";

  if($conn->multi_query($data)===TRUE)
  {
    echo " New Recorded was Created Successfuly ";
  }
  else
  {
    echo "error".$data. "<br>".$conn->error;
  }

$conn->close();
?>