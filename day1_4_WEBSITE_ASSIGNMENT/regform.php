<?php
include 'conn.php';
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  
$sql="insert into admin(fname,lname,contact,email,password) values('$fname','$lname','$contact','$email','$password')";
$query=mysqli_query($conn,$sql);
  if($query)
  {
    echo"<script>alert('REGISTRATION SUCCSESSFULLY')</script>";
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
		<title>TASIJA_Registration</title>
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
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" id="fname" name="fname" required>
						<input type="text" placeholder="Last Name" class="form-control" id="lname" name="lname" required>
					</div>
					<div class="form-wrapper">
						<input type="number" placeholder="Contact NO" class="form-control" id="rno" name="contact"  required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="email" placeholder="Email Address" class="form-control" id="course" name="email"  required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" id="password" name="password"  required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" id="password1" name=""  required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit" name="submit">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
		<!-- ############ REGISTRATION FORM end HERE FROM NOW ######### -->
			</div>
		</div>
		
	</body>
</html>