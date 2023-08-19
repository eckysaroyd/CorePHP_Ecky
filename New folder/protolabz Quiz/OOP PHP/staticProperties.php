<?php 
class properties{
	public static $new="this is static properties";
	function newStaticProperties()
	{
		return self::$new;
	}
}
$getStaticProperties = new properties();
echo $getStaticProperties->newStaticProperties();
?>