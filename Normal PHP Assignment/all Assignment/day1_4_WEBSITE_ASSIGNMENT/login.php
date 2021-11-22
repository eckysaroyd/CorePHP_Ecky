<?php
 include 'conn.php';
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="SELECT id,fname,lname,contact,email,password FROM admin  WHERE email='$email' and password='$password'";
	$query=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($query);
	if($count)
		{
			$row= mysqli_fetch_array($query);
			$fname =$row['fname'];
			$id= $row['id'];
			session_start();
			$_SESSION['fname']=$fname;
			$_SESSION['userid']=$userid;
			header('location:homepage.php');
		}
	else
		{
			echo "<script> alert('Email or Password incorrect, Please try again'); </script>";
		}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TASIJA</title>
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

				<!-- ############ login form start from here ################ -->
				<form action="" method="post">
					<h3>Login Form</h3>
						<div class="form-wrapper">
							<input type="email" placeholder="Enter your email" class="form-control" id="course" name="email" required>
							<i class="zmdi zmdi-account"></i>
						</div>
						<div class="form-wrapper">
							<input type="password" placeholder="Enter Your Password" class="form-control" id="password" name="password" required>
							<i class="zmdi zmdi-lock"></i>
						</div>
						<div class="form-wrapper">
							<a href="regform.php" class="text-muted newlink"><b>Register New Account</b></a>&nbsp;&nbsp;&nbsp;
							<a href="" class="text-muted newlink">forget Password</a>
						</div>
						<button type="submit" name="login">LogIn
							<i class="zmdi zmdi-arrow-right"></i>
						</button>
				</form>
			</div>
		</div>
		
	</body>
</html>