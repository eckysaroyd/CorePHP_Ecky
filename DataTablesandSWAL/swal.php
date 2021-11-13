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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<title></title>
</head>
<body>
		<table class="table" id="tbUser">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Address</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <!-- ## php codes for fetching data, editing and deleting it  ## -->
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
    <tr class="btnDelete">
       <tr>
      <td><?php echo $ab['id']; ?></td>
      <td><?php echo $ab['fname']; ?></td>
      <td><?php echo $ab['lname']; ?></td>
      <td><?php echo $ab['email']; ?></td>
      <td><?php echo $ab['contactno']; ?></td>
      <td><?php echo $ab['Address']; ?></td>
      <td class="edit"> <a class="edit" href="update.php?id=<?php echo $ab['id'];?>">edit</a></td>
      <td class="delete">
      	 <!-- <a class="delete" href="delete.php?id=?php echo $ab['id'];?>">delete</a> -->
        <button  class="delete" id ="swaal" onclick="myfunction(<?php echo $ab['id'];?>)">Delete</button>
       <!-- <a class="delete" id ="swaal" href="delete.php?id=?php echo $ab['id'];?>">delete</a> -->
     </td>
    </tr>
		      <?php
			  }
			  ?>
    </tr>
  </tbody>
				  	<?php
				    }
				    else
				    {
				    echo mysqli_error($conn);
				    }
				    ?>
</table>
<script>
	function myfunction(id){
	swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     /*  Ajax code will be here  */
     jQuery.ajax({
         url: 'delete.php',
         type: 'POST',
         data: {id:id},
         dataType: 'json',
      
      success:function(response){
        alert(response);
          if(response =="1"){
            swal('Deleted!', "This record and it`s details are permanantly deleted!");
          }
         else{
            swal('Oops...', 'Something went wrong with ajax !', 'error');
         }
         //readProducts();
      }
      })
      // .fail(function(){
         
      // });

 /*  Ajax code will be here  */
    // swal("Poof! Your imaginary file has been deleted!", {
    //   icon: "success",
    // });
      
        
      
  } 
  else {
    swal("Your Content has not Deleted!");
  }
});
}

$("#tbUser").on('click', '.btnDelete', function () {
    $(this).remove();
});

$(document).on('click', '#delete_product', function(e){
   var id = $(this).data('id');
   SwalDelete(id);
   e.preventDefault();
});
	</script>
</body>
</html>