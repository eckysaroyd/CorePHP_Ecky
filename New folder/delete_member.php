<?php
include ('database.php');

$id = $_GET['id'];
$delete_data"delete from tbl_member where tbl_member_id = '$id' ";
$database->exec($delete_data);
?>