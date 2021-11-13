<?php
include 'conn.php';
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $contactno=$_POST['contactno'];
  $Address=$_POST['Address'];
  
$sql="insert into student(fname,lname,email,contactno,Address) values('$fname','$lname','$email','$contactno','$Address')";
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
<html lang="en">
<head><title>My Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="favicon.png">


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" type="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link> 
</head>
<body>
   <!--       ###################### adding students data --  ############################### -->
<div class="container-fluid top-space4 p-5" style="background-color: #2a7f85;">

    <div class="text-center pr-5 pl-5 pt-2 pb-2">
      <h3 class="downHeaderFont line-height1" style="font-family: 'Dancing Script', cursive; color: #ffffff;"> STUDENT INFO</h3>
      <h3 class="text-center fontBody line-height" style ="color: #ffffff;">KINDLY ADD YOUR STUDENT INFORMATION</h3>
      <div class="form11 text-center p-5">
        
                  <form class="form-inline-flex text-center" method="post" onClick="submitForm()">
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">First name</label>
                            <input type="text" name="fname" class="form-control fname" id="staticEmail2" placeholder="First Name" required>
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Last name</label>
                            <input type="text" name="lname" class="form-control lname" id="staticEmail2" placeholder="Last Name" required>
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <input type="email" class="form-control email" name="email" id="staticEmail2 " placeholder="Email">
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Contact</label>
                            <input type="number" name="contactno" class="form-control contactno" id="inputPassword2" placeholder="Contact" required>
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Address</label>
                             <textarea name="Address" class="form-control Address" id="staticEmail2" placeholder="Enter Your Address" rows="3" required></textarea>
                          </div>
                      <button type="submit" name="submit" class="btn btn-primary p-3 mb-3 font-weight-bold buttonn" style="font-family: 'Dancing Script', cursive; color: #1f7e84; background-color: #c9e2db; border:2px solid  #1f7e84; border-radius:70px;" id="submit">Register Now</button>
                  </form>
    </div>
  </div>
  </div>
<!-- ##################################### - student data ending here  ######################### -->

<!-- ##################################### - fetching data container start-  ######################### -->
  <div class="container-fluid top-space6 ">
       <div>
      <h4 class="fontBody text-center font-weight-bold line-height1">How It Works</h4>
      <h3  class="downHeaderFont text-center font-weight-bold line-height1" style="font-family: 'Dancing Script', cursive; color: #1f7e84;"> HERE IS OUR STUDENTS NAMES </h3>
    </div>
      <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
          <!-- ----------  START TABLE HERE ----------   -->
        <!--   <table class="table table-sm" id="example"> -->
           <table id="example" class="display" style="width:100%">
        <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Contact No</th>
      <th scope="col"> Home Address</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <!-- ########### php codes for fetching data, editing and deleting data from Server ################### -->
  <?php
include "conn.php";
$eck="select * from student";
$result=mysqli_query($conn,$eck);
if($result)
{
  while($ab=mysqli_fetch_array($result))
  {
 ?>
  <tbody>
    <tr>
      <td><?php echo $ab['id']; ?></td>
      <td><?php echo $ab['fname']; ?></td>
      <td><?php echo $ab['lname']; ?></td>
      <td><?php echo $ab['email']; ?></td>
      <td><?php echo $ab['contactno']; ?></td>
      <td><?php echo $ab['Address']; ?></td>
      <td class="edit"> <a class="edit" href="update.php?id=<?php echo $ab['id'];?>">edit</a></td>
      <td class="delete">
        <button  class="delete" id ="swaal" onclick="myfunction()">Delete</button>
       <!-- <a class="delete" href="delete.php?id=?php echo $ab['id'];?>">delete</a> -->
     </td>
    </tr>
    <?php
  }
  ?>
  </tbody>
      <?php
    }
    else
    {
    echo mysqli_error($conn);
    }
    ?>
</table>
<!-- ---------- ENDING TABLE HERE --------------  -->
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>
<!-- ############# - clear submited data in form-  ############### -->

<script type="text/javascript">
  function submitForm() {

   var frm = document.getElementsByName('contact-form')[0];
   frm.submit();
   frm.reset();
   return false;
  }
  // ************* data table button ********
     $(document).ready(function() {
      $('#example').DataTable();
  } );
  // ******** swal button ******
  // function myFunction(){
  // {
  //     alert("i am here");
  //   
  //   // document.getElementById("swaal").style.color = "blue";
  // }
</script>


<script>
  function myfunction(){
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
}

$("#tbUser").on('click', '.btnDelete', function () {
    $(this).remove();
});
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

</body>
</html>