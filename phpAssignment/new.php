 <?php
// function myclass()
// {
if(isset($_POST['submit']))
{
	$studentsMax=$_POST['studentsMax'];
	 // starting our execution
	echo "STUDENT MAX IS : ".$studentsMax;
	if($studentsMax<35){
		echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
				  <strong> Work Hard!!</strong> student fail the test
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				  </button>
				</div>";
	}
	else if($studentsMax<50 && $studentsMax>35)
	{
		echo "<br><button type='button' class='btn btn-info'>student pass the test</button></button></button>";
	}
	else if($studentsMax <65 && $studentsMax>50)
	{
		echo "<br><button type='button' class='btn btn-info'>student score the third grade of the test</button></button>";
	}
	else if($studentsMax<75 && $studentsMax>65)
	{
		echo "<br><button type='button' class='btn btn-info'>student score the second grade of the test</button>";
	}
	else if ($studentsMax<90 && $studentsMax>75)
	{
		echo "<br><button type='button' class='btn btn-info'>student score the first grade of the test</button>";
	}
	else
	{
		echo "TOP MAX";
	}
}
 //}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>NEW ADDED FORM</title>
</head>
<body>
	<form method="post" onsubmit="return 'false'">
	<input type="text" name="studentsMax">
		<input type ="submit"  value="submit" name="submit"class="btn btn-primary">
	</form>
	

</body>
</html>