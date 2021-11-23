<!-- 
$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
print_r($xml); -->


<?php
$xml=simplexml_load_file("note.xml") or die("Error : Cannot create object");
print_r($xml);
echo "<br><br><br>";


$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;

?>