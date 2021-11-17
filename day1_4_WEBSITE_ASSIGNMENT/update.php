<?php
 include 'conn.php';
      $userid=$_GET['userid'];
      $sql="select * from employee where userid='$userid'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
if(isset($_POST['update']))
  {
    $efname=$_POST['efname'];
    $elname=$_POST['elname'];
    $econtact=$_POST['econtact'];
    $eemail=$_POST['eemail'];
    $eaddress=$_POST['eaddress'];
    $esalary=$_POST['esalary'];
    $status=$_POST['status'];

    
 $query ="UPDATE employee SET efname='$efname', elname='$elname', econtact='$econtact',eemail='$eemail',  eaddress='$eaddress', esalary='$esalary',status='$status' WHERE userid='$userid'";
$run_query = mysqli_query($conn,$query);


  if($run_query)
    {
      echo"<script>alert('UPDATED SUCCSESSFULLY')</script>"; 

          // window.location.href='formlogin.php';
          //THERE AN ERROR WITH HEADER FILE HERE.
          //header('location:homepage.php');
    }
    else
        {
          echo mysqli_error($conn);
        }
  }
?>
