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
    <title>COSPACE Management System</title>

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
       <?php include('include/navbar.php'); ?>
        
        
        
       <?php
$sql = "SELECT * FROM rooms WHERE book='true'";
$conn = oci_connect("username", "password", "database");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e["message"], ENT_QUOTES), E_USER_ERROR);
}

$result = oci_parse($conn, $sql);
oci_execute($result);

if ($result) {
    if (oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
        while ($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
            echo "
                <div class='row'>
                    <div class='col-md-2'></div>
                    <div class='col-md-6 well'>
                        <h4>" .
                $row["ROOM_CAT"] .
                "</h4><hr>
                        <h6>Checkin: " .
                $row["CHECKIN"] .
                " and checkout: " .
                $row["CHECKOUT"] .
                "</h6>
                        <h6>Name: " .
                $row["NAME"] .
                "</h6>
                        <h6>Phone: " .
                $row["PHONE"] .
                "</h6>
                        <h6>Booking Condition: " .
                $row["BOOK"] .
                "</h6>
                    </div>
                    &nbsp;&nbsp;
                    <a href='edit_all_room.php?id=" .
                $row["ROOM_ID"] .
                "'><button class='btn btn-primary button'>Edit</button></a>
                </div>
            ";
        }
    } else {
        echo "NO Data Exist";
    }
} else {
    $e = oci_error($result);
    echo "Cannot connect to server: " . $e["message"];
}

oci_close($conn);
?>



    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>