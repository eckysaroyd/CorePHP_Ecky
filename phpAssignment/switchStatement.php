<?php
if(isset($_POST['submit']))
{
  $days=$_POST['days'];
   // starting our execution
  echo "DAY : ".$days;


switch($days)
{
  case "monday":
    echo "<br>Go to school";
    break;
  case "tuesday":       
    echo "<br> Today you have to go to school";
    break;
  case "wednesday":
    echo "<br>Today you have to go to school";
    break;
  case "thursday":
    echo "Today you have to go to school";
    break;
  case "friday":
    echo "<br> Today you have to go to school";
    break;
  case "saturday":
    echo "<br> Today Is Holiday";
    break;
  default:
    echo "<br> Today is Holiday";
    break;
}

}
;?>
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
  <input type="text" name="days">
    <input type ="submit"  value="submit" name="submit"class="btn btn-primary">
  </form>
</body>
</html>
