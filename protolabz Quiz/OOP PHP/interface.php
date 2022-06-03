<?php
interface  animal{
	public function makeSound();
}
class cat implements animal{
	public function makeSound(){
		echo "CAT : 'Meow' <br>";
	}
}
class dog implements animal{
	public function makeSound(){
		echo "DOG : 'Bark' <br>";
	}
}
class mice implements animal{
	public function makeSound(){
		echo "MICE : 'Squeak' <br> ";
	}
}
$cat= new cat();
$dog = new dog();
$mice = new mice();
$animal  =array($cat,$dog,$mice);

foreach($animal as $animal)
{
	$animal->makeSound();
}
?>