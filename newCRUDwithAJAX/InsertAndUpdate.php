<?php
if(count($_POST)>0)
{    
include 'conn.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
if(empty($_POST['id'])){
$query = "INSERT INTO sample (fname,lname,email,address)VALUES ('$fname','$lname','$email','$address')";
}else{
$query = "UPDATE sample set id='" . $_POST['id'] . "', fname='" . $_POST['fname'] . "', lname='".$_POST['lname'] . "  email='" . $_POST['email'] . "', address='" . $_POST['address'] . "' WHERE id='" . $_POST['id'] . "'"; 
}
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>