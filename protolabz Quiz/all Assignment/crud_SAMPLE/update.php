<?php
include 'conn.php';
$id=$_GET['id'];
$sql='select * from sample where id="$id"';
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
if(isset($_POST['update']))
{
	
}