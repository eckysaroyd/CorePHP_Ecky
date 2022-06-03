<?php include('header.php') ?>
<body>
   <div class="row-fluid">
   <div class="span12">
   <div class="container">
   <br><br>
   <h3 style="text-align:center;">
      Delete Data without Refreshing Page
   </h3>

<table class="table table-striped table-bordered" id="example">
   <thead>
      <tr>
         <th>Member Name</th>
         <th>Contact</th>
         <th>Date Added</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      <?php
         $result = $database->prepare ("SELECT * FROM tbl_member");
         $result ->execute();
         for ($count=0; $row_member = $result ->fetch(); $count++){
         $id = $row_member['tbl_member_id'];
         ?>
      <tr class="delete_mem<?php echo $id ?>">
         <td><?php echo $row_member['tbl_member_name']; ?></td>
         <td><?php echo $row_member['tbl_member_contact']; ?></td>
         <td><?php echo date("M d, Y h:i:s A", strtotime ($row_member['tbl_member_added'])); ?></td>
         <td width="80">
            <a class="btn btn-danger" id="<?php echo $id; ?>">Delete</a>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>

	</div>
	</div>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this Member?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_member.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>

</body>
</html>


