<?php
	include 'conn.php';
	$id = $_POST["id"];
	$data=[];
	$query_emp = "SELECT * FROM `employee` WHERE `userid`=$id";
	$result = mysqli_query($conn,$query_emp) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) > 0){
		$result_ans = mysqli_fetch_assoc($result);
		$data["userid"] = $result_ans["userid"];
		$data["efname"] = $result_ans["efname"];
		$data["elname"] = $result_ans["elname"];
		$data["econtact"] = $result_ans["econtact"];
		$data["eemail"] = $result_ans["eemail"];
		$data["eaddress"] = $result_ans["eaddress"];
		$data["esalary"] = $result_ans["esalary"];
		$data["status"] = $result_ans["status"];
		$data = json_encode($data);
		echo "yes#".$data;
	}else{
		echo "no#".$data;
	}
	mysqli_close($conn);
?>