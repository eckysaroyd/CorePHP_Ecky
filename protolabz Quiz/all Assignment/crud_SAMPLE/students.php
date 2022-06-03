<?php
	include 'conn.php';
	$id = $_POST["id"];
	$html ="";
	$query_Students = "SELECT * FROM `sample` WHERE `id`=$id";
	$result = mysqli_query($conn,$query_Students) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) > 0){
		$result_ans = mysqli_fetch_assoc($result);
		$html.='<form method="post">
                <div class="form-row">
                	<input type="hidden" class="form-control" name="id" id="userid" value="'.$id.'">
                  <div class="form-group  text-left">
				    <label for="exampleInputEmail1">First name</label>
				    <input type="text" class="form-control" id="fname" aria-describedby="" placeholder="Enter First name" name="fname" value="'.$data['id'].'">
					</div>

                  <div class="form-group col-md-6">
                    <label for="aelname">lname</label>
                    <input type="text" class="form-control" name="aelname" id="aelname" placeholder="lname" value="'.$data['fname'].'">
                  </div>
                </div>

                <div class="form-group text-left">
				    <label for="exampleInputEmail1">Last name</label>
				    <input type="text" class="form-control" id="lname" aria-describedby="" name="lname" placeholder="Enter Last name" value="'.$data['lname'].'">
				  </div>
				 
				  <div class="form-group  text-left">
				    <label for="exampleInputPassword1">Email</label>
				    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="'.$data['email'].'">
				  </div>

				  <div class="form-group  text-left">
				    <label for="exampleInputEmail1"> Home Address</label>
				    <input type="text" class="form-control" id="address" aria-describedby="" placeholder="Enter First name" value="'.$data['address'].'">
				  </div>

				  <button type="submit" class="btn btn-primary swal-data" name="submit"  id="btn-submit">Submit</button>
				</form>';
		echo "yes#".$html;
	}else{
		echo "no#".$html;
	}
	mysqli_close($conn);
?>