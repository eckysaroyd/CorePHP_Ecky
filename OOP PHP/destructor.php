<?php
class fruits{
	public $name;
	public $color;

	function __construct($name,$color)
	{
		$this->name=$name;
		$this->color=$color;
	}
	function __destruct()
	{
		echo "the name of fruit is{$this->name } and the color is: {$this->color}.";
	}
}
$Apple = new fruits("apple","red");
?>