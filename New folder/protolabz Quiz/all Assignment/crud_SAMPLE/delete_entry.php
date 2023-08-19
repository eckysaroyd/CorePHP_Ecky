<?php
include'conn.php';
$id=$_GET['id'];
$sql="delete from sample where id='$id'";
$result=mysqli_query($conn,$sql);
if($result)
{
	echo"delete";

}
else
{
	echo mysqli_error($conn);
}
?>