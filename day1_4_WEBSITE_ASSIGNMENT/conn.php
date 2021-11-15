<?php
$conn = mysqli_connect('localhost','root','','eckyprotolabz');
if(!$conn)
	{
	die('could not connect to database'.mysqli_connect_error());
	}
?>