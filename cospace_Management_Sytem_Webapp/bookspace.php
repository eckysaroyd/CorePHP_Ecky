<?php
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 



    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->check_available($checkin, $checkout);
        if(!($result))
        {
            echo $result;
        }


    }
        




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
    
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>
    
    
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
        label
        {
            color:#ffbb2b;
            font-size: 13px;
            font-weight: 100;
        }

    </style>
    
    
</head>

<body>
    <div class="container">
      
      
    <img class="img-responsive" src="images/logo.png" style="max-width: 37%; height: 56px;">      
       <?php include('include/navbar.php'); ?>
        
       <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-5 well'>
         <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkout">
                </div>
                 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary button" name="submit">Check Availability</button>

            </form>
           </div>
           <div class="col-md-3"></div>
        </div> 
        <?php   
if(isset($_REQUEST['submit']))
{
    $conn = oci_connect('username', 'password', 'database');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    $sql="SELECT * FROM office_space";
    $result = oci_parse($conn, $sql);
    oci_execute($result);

    if(oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS))
    {
        while($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS))
        {
            $room_cat=$row['room_cat'];
            $sql="SELECT * FROM room_category WHERE space_name='$room_cat'";
            $query = oci_parse($conn, $sql);
            oci_execute($query);
            $row2 = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS);
            
            echo "
                <div class='row'>
                    <div class='col-md-4'></div>
                    <div class='col-md-5 well'>
                        <h4>".$row2['SPACE_NAME']."</h4><hr>
                        <h6>Number_of All Rooms: ".$row['number_of_rooms']."</h6>
                        <h6>Price: ".$row['cost']."inr.</h6>
                        <h6>Available till : ".$row['monthly_availability']."</h6>
                    </div>
                    <div class='col-md-3'>
                        <a href='./booknow.php?roomname=".$row2['SPACE_NAME']."'><button class='btn btn-primary button'>Book Now</button></a>
                    </div>   
                </div>";
        }             
    }
}

oci_close($conn);
?>


    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>