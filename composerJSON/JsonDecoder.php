<?php
	//$majina = '{"Peter":35,"Ben":37,"Joe":43}';
    //echo var_dump(json_decode($majina));

    $newAge = '{"Peter":35,"Ben":37,"Joe":43}';
	$object = json_decode($newAge);

	foreach($object as $key => $value) {
  	echo $key . " => " . $value . "<br>";
}
?>