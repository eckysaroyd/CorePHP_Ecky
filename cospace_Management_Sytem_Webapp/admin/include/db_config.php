<?php
// Define connection parameters
$username = "c##cospace";
$password = "cospace123";
$hostname = "localhost";
$port = "1522";
$servicename = "//localhost/orcl";

// Establish a connection to Oracle database
$conn = oci_connect($username, $password, "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=$hostname)(PORT=$port))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=$servicename)))");

// Check if connection was successful
if (!$conn) {
    $error = oci_error();
    echo "Connection failed: " . $error['message'];
} else {
    echo "Connection successful";
    // do other database operations here
}
?>
