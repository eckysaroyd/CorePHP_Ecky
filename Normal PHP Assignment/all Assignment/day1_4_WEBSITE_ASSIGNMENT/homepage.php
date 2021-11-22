
<!DOCTYPE html>
<html>
	<head>
		 <title>cvv</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- BOOSTRAP CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- DATATABLE DESING -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">

  		//MATERIAL DESIGN ICONIC FONT ###  //
  		  <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

          // <!-- STYLE CSS -->
          <link rel="stylesheet" href="css/style.css">
          // google icons>
          <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  		//<!--STYLE CSS -->
      <a href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
  		<link rel="stylesheet" href="css/style.css">
  		<script type="text/javascript" src="jquery.js"></script>
        <!-- swal css -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>

	<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="#">home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <b class="nav-link" ><?php echo $fname; ?></b>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="regform.php">Add Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
          </li>    
        </ul>
      </div>  
      </nav>
<!-- FETCH DATA FROM DATABASE -->
      <div class="container">
       <div class="row">
              <div class="col-md-4">
                
              </div>
              <div class="col-md-4 text-center font-weight-bold p-3">
                This is a List of All Employees in Our Company
              </div>
            <div class="col-md-4 mt-5 mt-5">
  
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  <i class="fa fa-plus-square"> </i>Add new 
                </button>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add New Employee</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
              <div class="modal-body">
                <?php
                    if(isset($_POST['empREG']))
                    {
                      $efname=$_POST['efname'];
                      $elname=$_POST['elname'];
                      $econtact=$_POST['econtact'];
                      $eemail=$_POST['eemail'];
                      $eaddress=$_POST['eaddress'];
                      $esalary=$_POST['esalary'];
                      $status=$_POST['status'];

                      
                    $sql="INSERT into employee(efname,elname,econtact,eemail,eaddress,esalary,status) values('$efname','$elname','$econtact','$eemail','$eaddress','$esalary','$status')";
                    $query=mysqli_query($conn,$sql);
                      if($query)
                      {
                        echo"<script>alert('EMPLOYEE ADDED SUCCSESSFULLY')</script>";
                      }
                      else
                      {
                        echo mysqli_error($conn);
                      }
                    }
                    ?>
                <form method="post">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="fname">fname</label>
                          <input type="text" class="form-control" name="efname" id="fname" placeholder="fname">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lname">lname</label>
                          <input type="text" class="form-control" name="elname" id="lname" placeholder="lname">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="fname">Contact</label>
                          <input type="contact" class="form-control" name="econtact" id="Contact" placeholder="Contact">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lname">Email</label>
                          <input type="email" class="form-control" name="" id="eemail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="eaddress" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputCity">Salary</label>
                          <input type="text" class="form-control" name="esalary" id="Salary">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputState">Status</label>
                          <select id="inputState" name="status" class="form-control">
                            <option selected>Active</option>
                            <option>Deactive</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            Check me out
                          </label>
                        </div>
                        <div class="mr-5"><button type="submit" class="btn btn-primary" name="empREG">Add New</button></div>
                      </div>
                      
                    </form>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                      
                      </div>
                      
                    </div>
                  </div>
                </div>
          </div>
                
              </div>
            </div>
          </div>
       </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">                
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#SNO</th>
                            <th>First_Name</th>
                            <th> Last_Name </th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody id="getStudentRecords">
                      <?php
                          
                          $sql="select * from employee where userid='$Edituserid'";
                          $result=mysqli_query($conn,$sql);
                          if(mysqli_num_rows($result))
                          {
                            while($ab=mysqli_fetch_array($result))
                            {
                      ?>
                         <tr class="btnDelete">
                             <td><?php echo $ab['userid']; ?> </td>
                            <td><?php echo $ab['efname']; ?> </td>
                            <td> <?php echo $ab['elname']; ?></td>
                            <td><?php echo $ab['econtact']; ?> </td>
                            <td> <?php echo $ab['eemail']; ?></td>
                           
                            <td> <?php echo $ab['esalary']; ?></td>
                            <td> <?php echo $ab['status']; ?></td>
                            <td class="edit"> <a class="edit" color: white; background-color: #0a6cdb; href="update.php?id=<?php echo $ab['userid'];?>">edit</a>
                           <button  class="delete btn btn-danger" id ="swaal" onclick="myfunction(<?php echo $ab['userid'];?>)">Delete</button>
                            </td>
                            <
                        </tr>
                            <?php
                             } 
                              
                             }
                              else
                                 {
                             ?>
                              <tr>
                               <td colspan="9" class="text-center">No Record Found</td> 
                              </tr>
                            <?php  } ?>
                          </tbody>
                    <tfoot>
                              <tr>
                                  <th>#SNO</th>
                                  <th>First_Name</th>
                                  <th> Last_Name </th>
                                  <th>Contact</th>
                                  <th>Email</th>
                                  <th>Salary</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                  
                              </tr>
                     </tfoot>
                </table>
            </div>
          </div>
        </div>
        
    <!--########## FOOTER ##########-->
    <footer class="mt-5">
      <div class="jumbotron text-center " style="margin-bottom:0">
        <p>Thank For choosing us </p>
      </div>
    </footer>

    <script type="text/javascript">
            $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     // let start swal buttons and AJAX
          function myfunction(userid){
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
                 data: {userid:userid},
                 dataType: 'json',
              
              success:function(response){
                // alert(response);
                var resp =split.response("#")
                  if(resp[0] =="1"){
                    swal('Deleted!', "This record and it`s details are permanantly deleted!");
                    jQuery("#getStudentRecords").html(resp[1]);
                  }
                 else{
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                 }
              }
               setInterval('location.reload()', 7000); 
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
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script type="text/javascript" src=" https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js "></script>
 <script type="text/javascript" src=" https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js "></script>
</body>
</html>

