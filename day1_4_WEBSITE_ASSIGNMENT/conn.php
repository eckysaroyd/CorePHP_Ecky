<? php
$conn = muysqli_connect("localhost","root","","");
if(!conn)
{
	die('could not connected to the database'.mysqlierror());
}
?>