<?php
include "CONN.php";
$id = $_POST['id'];
$query="SELECT * from sample WHERE id = '" . $id . "'";
$result = mysqli_query($dbCon,$query);
$data= mysqli_fetch_array($result);
if($data) {
echo json_encode($data);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
?>