<?php
trait message1
{
	public function msg1()
	{
		echo "PHP OOP is Quiet Nice";
	}
}
trait message2
{
	public function msg2()
	{
		echo "Just OOP can reduce the code work";
	}
}
class myClass1
{
	use message1;
}
class myClass2
{
	use message2;
}

$msg1= new myClass1();
$msg1->msg1();
echo "<br>";

$msg2= new myClass2();
$msg2->msg2();
echo "<br>";
?>
