<?php
	include 'conn.php';
	$id = $_POST["id"];
	$data=[];
	$html ="";
	$query_emp = "SELECT * FROM `employee` WHERE `userid`=$id";
	$result = mysqli_query($conn,$query_emp) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) > 0){
		$result_ans = mysqli_fetch_assoc($result);
		$html.='<form method="post">
                <div class="form-row">
                	<input type="hidden" class="form-control" name="userid" id="userid" value="'.$id.'">
                  <div class="form-group col-md-6">
                    <label for="aefname">fname</label>
                    <input type="text" class="form-control" name="aefname" id="aefname" placeholder="fname" value="'.$result_ans["efname"].'">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="aelname">lname</label>
                    <input type="text" class="form-control" name="aelname" id="aelname" placeholder="lname" value="'.$result_ans["elname"].'">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="contact">Contact</label>
                    <input type="contact" class="form-control" name="aecontact" id="aecontact" placeholder="Contact" value="'.$result_ans["econtact"].'">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lname">Email</label>
                    <input type="email" class="form-control" name="aeemail" id="aeemail" placeholder="Email" value="'.$result_ans["eemail"].'">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" name="aeaddress" id="aeaddress" placeholder="1234 Main St" value="'.$result_ans["eaddress"].'">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Salary</label>
                    <input type="text" class="form-control" name="aesalary" id="aesalary" value="'.$result_ans["esalary"].'">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Status</label>
                    <select id="aestatus" name="aestatus" class="form-control">';?>
                    <?php
                    $selected = "selected"; 
                    if($result_ans["status"]==1) {
                    	$html.='<option value="1" '. $selected.'>Active</option>';  
                    	$html.='<option value="0">Inactive</action>';
                    }else{
                    	$html.='<option value="1">Active</option>';  
				  		$html.='<option value="0" '. $selected.'>Inactive</action>';
				  	}                
					
					
                    $html.='</select>
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
                  <div class="mr-5"><button type="submit" class="btn btn-primary" name="update"  id="update" >Update Employee</button></div>
                </div>
              </form>';



		// $data["userid"] = $result_ans["userid"];
		// $data["efname"] = $result_ans["efname"];
		// $data["elname"] = $result_ans["elname"];
		// $data["econtact"] = $result_ans["econtact"];
		// $data["eemail"] = $result_ans["eemail"];
		// $data["eaddress"] = $result_ans["eaddress"];
		// $data["esalary"] = $result_ans["esalary"];
		// $data["status"] = $result_ans["status"];
		// $data = json_encode($data);
		echo "yes#".$html;
	}else{
		echo "no#".$html;
	}
	mysqli_close($conn);
?>