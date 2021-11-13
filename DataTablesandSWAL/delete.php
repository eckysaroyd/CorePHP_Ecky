<?php
include'conn.php';
$id=$_POST['id'];
//echo $id;
$sql="delete from student where id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
	echo "1";
}else{
	echo "0";
}
?>