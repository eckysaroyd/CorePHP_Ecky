<?php
include 'conn.php';
if(isset($_POST['empREG']))
{
  $efname=$_POST['efname'];
  $elname=$_POST['elname'];
  $econtact=$_POST['econtact'];
  $eemail=$_POST['eemail'];
  $eaddress=$_POST['eaddress'];
  $esalary=$_POST['esalary'];
  $status=$_POST['status'];

  
$sql="INSERT into employee(efname,elname,econtact,eemail,eaddress,esalary,status) values('$efname','$elname','$econtact','$eemail','$eaddress','$esalary','$status')";
$query=mysqli_query($conn,$sql);
  if($query)
  {
    echo"<script>alert('EMPLOYEE ADDED SUCCSESSFULLY')</script>";
  }
  else
  {
    echo mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Employee</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="jquery.js"></script>
	</head>

	<body>

		<div class="wrapper hi" style="background-image: url('images/th.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/pict1.jpg" alt="">
				</div>
				<!-- ############ REGISTRATION FORM START HERE FROM NOW ######### -->
				<form  method="post" >
					<h3>Add Employee Details</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" id="name" name="efname" required>
						<input type="text" placeholder="Last Name" class="form-control" id="lname" name="elname" required>
					</div>
					<div class="form-wrapper">
						<input type="number" placeholder="Employee Contact No" class="form-control" id="rno" name="econtact"  required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="email" placeholder="Enter Employee Email Address" class="form-control" id="course" name="eemail"  required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Enter Employee Home Address" class="form-control" id="eaddress" name="eaddress"  required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Enter Employee Salary" class="form-control" id="salary" name="esalary"  required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<select name="status" id="year" class="form-control">
							<option value="" disabled selected>Status</option>
							<option value="1year">Active</option>
							<option value="2year">Deactive</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<button type="submit" name="empREG"> ADD NOW
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<div class="font-weight-bold  p-3">
					<p class="font-weight-bold  p-3 sub1"><a href="homepage.php"><i class="zmdi zmdi-mail-reply-all"> Go back</i></a></p>
					</div>
				</form>
		<!-- ############ REGISTRATION FORM end HERE FROM NOW ######### -->
			</div>
		</div>
		
	</body>
</html>