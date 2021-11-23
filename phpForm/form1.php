<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>php form</title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<input type="text" name="name">
		
	</form>
	<p>welcome,  
				<?php echo $_POST["name"]; ?>
	</p>
</body>
</html>
