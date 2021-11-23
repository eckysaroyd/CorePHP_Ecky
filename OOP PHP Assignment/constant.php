<?php
class myCode{
	const MYLEARNINGCOURSE= "I'm a fullstack web Developer Using PhP Knowledge";

	function course()
	{

		echo self::MYLEARNINGCOURSE;
	}
}
$code = new myCode();
$code->course(); 
?>