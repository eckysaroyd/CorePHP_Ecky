<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Ajax CRUD in PHP.</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container mt-2">
         <div class="row">
            <div class="col-md-8 mt-1 mb-1">
               <h2 class="text-white bg-dark">NEW STUDENTS DETAILS</h2>
            </div>
            <div class="col-md-8 mt-1 mb-2"><button type="button" id="addNewUser" class="btn btn-success">Add</button></div>
            <div class="col-md-8">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fnaame</th>
                        <th scope="col">Lname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        include 'conn.php';
                        $query="select * from sample limit"; 
                        // $result=mysqli_query($dbCon,$query);
                      
                        $result=$dbCon->query($query);
                        if($result){
                        if ($result->num_rows> 0)
                             ?>
                     <?php if ($result->num_rows > 0): ?>
                     <?php while($array=mysqli_fetch_row($result)): ?>
                     <tr>
                        <th scope="row"><?php echo $array[0]; ?></th>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                        <td><?php echo $array[3]; ?></td>
                        <td><?php echo $array[4]; ?></td>
                        <td> 
                           <a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0]; ?>">Edit</a>
                           <a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0]; ?>">Delete</a>
                        </td>
                     </tr>
                     <?php endwhile; ?>
                     <?php else: ?>
                     <tr>
                        <td colspan="4" rowspan="1" headers="">No Data Found</td>
                     </tr>
                     <?php endif; ?>
                     <?php mysqli_free_result($result); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- boostrap model -->
      <div class="modal fade" id="user-model" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="userModel"></h4>
               </div>
               <div class="modal-body">
                  <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
                     <input type="hidden" name="id" id="id">
                     <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="" maxlength="50" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="" maxlength="50" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                           <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="address" name="address" placeholder="Enter Email" value="" required="">
                        </div>
                     </div>
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser">Save changes
                        </button>
                     </div>
                  </form>
               </div>
               <div class="modal-footer"></div>
            </div>
         </div>
      </div>
      <!-- end bootstrap model -->
      <script type = "text/javascript" >
    $(document).ready(function($) {
        $('#addNewUser').click(function() {
            $('#userInserUpdateForm').trigger("reset");
            $('#userModel').html("Add New User");
            $('#user-model').modal('show');
        });
        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            // ajax
            $.ajax({
                type: "POST",
                url: "edit.php",
                data: {id: id},
                dataType: 'json',
                success: function(res) {
                    $('#userModel').html("Edit User");
                    $('#user-model').modal('show');
                    $('#id').val(res.id);
                    $('#fname').val(res.fname);
                    $('#lname').val(res.lname);
                    $('#email').val(res.email);
                    $('#address').val(res.address);
                }
            });
        });
        $('body').on('click', '.delete', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {id: id},
                    dataType: 'json',
                    success: function(res) {
                        $('#fname').html(res.fname);
                        $('#lname').html(res.lname);
                        $('#email').html(res.email);
                        $('#address').html(res.address);
                        window.location.reload();
                    }
                });
            }
        });
        $('#userInserUpdateForm').submit(function() {
          
            $.ajax({
                type: "POST",
                url: "InsertAndUpdate.php",
                data: $(this).serialize(), // get all form field value in 
                dataType: 'json',
                success: function(res) {
                    window.location.reload();
                }
            });
        });
    }); 
</script>
</body>
</html>