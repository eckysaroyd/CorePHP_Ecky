<?php
    // Connect to Oracle SQL database
$conn = oci_connect('sys', 'Admin@123', 'cospace');

// Check connection
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

?>


