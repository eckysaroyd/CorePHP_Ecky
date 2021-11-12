<?php
include'conn.php';
$id=$_GET['id'];
$sql="delete from student where id='$id'";
$result=mysqli_query($conn,$sql);
if($result)
{
	//echo"delete";
	header('location:formlogin.php');
}
else
{
	echo mysqli_error($conn);
}
?>