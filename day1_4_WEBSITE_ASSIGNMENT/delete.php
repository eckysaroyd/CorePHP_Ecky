<?php
include'conn.php';
$userid=$_POST['userid'];
//echo $userid;
//$sql="DELETE from employee WHERE userid='$userid'";
//$result=mysqli_query($conn,$sql);
$result=1;
if($result){
    $html ='';
    $eck="select * from employee";
    $result=mysqli_query($conn,$eck);
    if($result)
    {
      while($ab=mysqli_fetch_array($result)){
    $html.='<tr class="btnDelete">
        <td>'.$ab['efname'].'</td>
        <td>'.$ab['elname'].'</td>
        <td>'.$ab['econtact'].'</td>
        <td>'.$ab['eemail'].'</td>
        <td>'.$ab['eaddress'].'</td>
        <td>'.$ab['esalary'].'</td>
        <td>'.$ab['status'].'</td>
        <td class="edit"> <a class="edit" href="update.php?userid='.$ab['userid'].'">edit</a></td>
        <td class="delete"> <button  class="delete" userid ="swaal" onclick="myfunction('.$ab['userid'].')">Delete</button>
        </td>
      </tr>';
        }   
    }else{
        $html.='<tr>
           <td colspan="9" class="text-center">No Record Found</td> 
          </tr>';
    }

    echo "1#".$html;
}else{
    echo "0#";
}
?>