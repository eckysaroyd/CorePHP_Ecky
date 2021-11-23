<?php
class fruits{
	public $name;
	public $color;

	public function __construct($name,$color)
	{
		$this->name=$name;
		$this->color=$color;
	}
	public function get_myFruits()
	{
		echo "my choosen fruit is {$this->name} and the color I have choosen is {$this->color}";
	}
}
 class stawberry extends fruits{
 	public function myStawberry()
 	{
 		echo " function fruits and function stawberry has joined.. woow!!<br>";
 	}
 }
 $stawb = new stawberry('stawberry','black');
 $stawb->myStawberry();
 $stawb->get_myFruits();
//https://www.studytonight.com/php/php-this-keyword
?>