<?php
include'conn.php';
$id=$_POST['id'];
//echo $id;
$sql="delete from student where id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
	$html ='';
	$eck="select * from student";
	$result=mysqli_query($conn,$eck);
	if($result)
	{
	  while($ab=mysqli_fetch_array($result)){
    $html.='<tr class="btnDelete">
        <td>'.$ab['id'].'</td>
        <td>'.$ab['fname'].'</td>
        <td>'.$ab['lname'].'</td>
        <td>'.$ab['email'].'</td>
        <td>'.$ab['contactno'].'</td>
        <td>'.$ab['Address'].'</td>
        <td class="edit"> <a class="edit" href="update.php?id='.$ab['id'].'">edit</a></td>
        <td class="delete"> <button  class="delete" id ="swaal" onclick="myfunction('.$ab['id'].')">Delete</button>
        </td>
      </tr>';
	 	}	
    }else{
        $html.='<tr>
           <td colspan="8" class="text-center">No Record Found</td> 
          </tr>';
    }

	echo "1"."#".$html;
}else{
	echo "0";
}
?>