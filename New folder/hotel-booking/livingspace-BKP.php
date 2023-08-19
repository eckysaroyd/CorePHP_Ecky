<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }


    </style>
    
    
</head>

<body>
    <div class="container">
      
      
    <img class="img-responsive" src="images/logo.png" style="max-width: 37%; height: 56px;">      
    <?php 
include('include/navbar.php');

$sql="SELECT * FROM living_space";
$result = oci_parse($conn, $sql);
oci_execute($result);

if($result)
{
    if(oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS))
    {
        while($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS))
        {
            echo "
                <div class='row'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6 well'>
                        <h4>".$row['SPACE_NAME']."</h4><hr>
                        <h6>Place : ".$row['STATE'].", ".$row['CITY'].", ".$row['ZIPCODE']."</h6>
                        <h6>Number_of All Rooms: ".$row['NUMBER_OF_ROOMS']."</h6>
                        <h6>Price: ".$row['COST']."inr.</h6>
                        <h6>Available till : ".$row['MONTHLY_AVAILABILITY']."</h6>
                    </div>
                    <div class='col-md-3'>
                        <a href='./booknow.php?roomname=".$row['SPACE_NAME']."'><button class='btn btn-primary button'>Book Now</button> </a>
                    </div>   
                </div>
            ";
        }   
    }
    else
    {
        echo "No Living Space Data Exist";
    }
}
?>
    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>