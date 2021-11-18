<?php 
include 'conn.php';
if(isset($_POST['submit']))
{
	 $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
	 $email = $_POST['email'];
	 $address =$_POST['address'];

	 $sql = "INSERT into sample(fname,lname,email,address)values('$fname','$lname','$email','$address')";
	 $query = mysqli_query($conn,$sql);
	 if ($query)
	 {
	 	echo"<script>alert('trying only');</script>";
	 }
	  {
         echo mysqli_error($conn);
      }
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <link rel="stylesheet" href="home.css">
	 <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <script src="jquery.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center ">
				<p class="pt-5"> Add new Student here
					<button type="button" class="btn btn-info btn-lg pt-5" data-toggle="modal" data-target="#myModal">ADD NEW</button></p>
				   <div class="modal fade" id="myModal" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				           <button type="button" class="close" data-dismiss="modal">&times;</button>
				          
				        </div>
				        <div class="modal-body">
				            <!-- insert form added -->
				            <form method="post" id="form">
							  <div class="form-group  text-left">
							    <label for="exampleInputEmail1">First name</label>
							    <input type="text" class="form-control" id="fname" aria-describedby="" placeholder="Enter First name" name="fname" required>

							  </div>
							  <div class="form-group text-left">
							    <label for="exampleInputEmail1">Last name</label>
							    <input type="text" class="form-control" id="lname" aria-describedby="" name="lname" placeholder="Enter Last name" required>
							  </div>
							  <div class="form-group  text-left">
							    <label for="exampleInputPassword1">Email</label>
							    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
							  </div>
							  <div class="form-group  text-left">
							    <label for="exampleInputEmail1"> Home Address</label>
							    <input type="text" class="form-control" id="address" aria-describedby="" placeholder="Enter First name" name="address" required>
							  </div>
							  <button type="submit" class="btn btn-primary swal-data" name="submit"  id="btn-submit">Submit</button>
							</form>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default swal-data" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
					  </div>
					</div>
				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12" p-5>
				<h1 class="text-center "> STUDENTS LIST</h1>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 p-5">

						<table id="example" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>ID</th>
					                <th>First Name</th>
					                <th>Last Name</th>
					                <th>Email</th>
					                <th>Address</th>
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
					        	$students='select * from sample';
					        	$results=mysqli_query($conn,$students);
					        	if(mysqli_num_rows($results))
					        	{
					        		while($data=mysqli_fetch_array($results))
					        		{
					        	?>
					            <tr>
					                <td><?php echo $data['id'];  ?></td>
					                <td><?php echo $data['fname']; ?></td>
					                <td><?php echo $data['lname']; ?></td>
					                <td><?php echo $data['email']; ?></td>
					                <td> <?php echo $data['address']; ?> </td>
					                 <td class="edit"> <button id="edit-students" class="edit btn btn-success" onclick="edit_record(<?php echo $data['id']; ?>)">Edit</button>
                                   <button  class="delete btn btn-danger" id ="swaal" onclick="myfunction(<?php echo $ab['id'];?>)">Delete</button>
                                    </td>
					            </tr>
					            <?php
					        		}
					            	} else{
					            	?>
					            	<tr>
                                   <td colspan="9" class="text-center">No Record Found</td> 
                                </tr>
                                <?php
		                           		 }
		                            ?>
					        </tbody>
					        <tfoot>
					            <tr>
					                <th>ID</th>
					                <th>First Name</th>
					                <th>Last Name</th>
					                <th>Email</th>
					                <th>Address</th>
					                <th>Action</th>
					            </tr>
					        </tfoot>
		    		    </table>
				
			</div>
		</div>
	</div>
	 <!-- The Modal -->
      <div class="modal" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Students</h4>
              <button type="button" id="" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body update-student">
              
            </div>
              
          </div>
        </div>
      </div>
	<script type="text/javascript">

		//swal function
		$('#btn-submit').click(function (e){
		    e.preventDefault();
		    let form = $(this).parents('form');
		    swal({
		        title: 'ADDED',
		        text: 'Thank you for adding new student',
		        icon: 'success',
		    }).then(function(value) {
		        if(form.value){
		          form.submit();
		        }
		    });
			});
	
			//*****-- Data Table-- *****
			$(document).ready(function() {
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              } );
            });
			// fetch data from db using ajax
			function edit_record(id){
				$.ajax({
					url:'students.php',
					type: "POST",
					datatype:"json",
					data:{id:id},
					cache:false;
					 success: function(dataResult){
					 	var resp =dataResult.split('#');
					 	if(resp[0]!='no'){
					 		$('.update-emp').html(resp[1]);
					 		$("#edit").modal('show');
					 	}
					 	else{
                      alert("No Data");
					 }
				});
			}
			// let start swal buttons and AJAX
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
                // alert(response);
                 location.reload();
                var resp =response.split("#")
                  if(resp[0] =="1"){
                    swal('Deleted!', "This record and it`s details are permanantly deleted!");
                    jQuery("#getStudentRecords").html(resp[1]);
                  }

                 else{
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                 }
              },
              error:function(response){
              
                  // alert("Im in Error");
              }
              })
                
              
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
           var userid = $(this).data('userid');
           SwalDelete(userid);
           e.preventDefault();
        });
	</script>
	<script type="text/javascript" >
        $(function() {

            $(".delete").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "delete_entry.php", //URL to the delete php script
                        data : info,
                        success : function() {
                        }
                    });
                    $(this).parents(".record").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
 </script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	 </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	</body>
	</html>