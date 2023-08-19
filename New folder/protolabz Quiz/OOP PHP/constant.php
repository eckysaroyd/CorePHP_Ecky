<?php
class myCode{
	const MYLEARNINGCOURSE= "I'm a fullstack web Developer Using PHP Knowledge";

	function course()
	{

		echo self::MYLEARNINGCOURSE;
	}
}
$code = new myCode();
$code->course(); 
?>