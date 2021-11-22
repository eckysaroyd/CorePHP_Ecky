<?php
class Animal
{
	//properties
	public $Animal_name;
	public $Animal_Zoo_Name;

	//method
	function set_Animal_name($Animal_name)
	{
		$this->Animal_name = $Animal_name;
	}
	function get_Animal_name()
	{
		return $this->Animal_name;
	}
	function set_Animal_Zoo($Animal_Zoo_Name)
	{
		$this->Animal_Zoo_Name = $Animal_Zoo_Name;
	}

	function get_Animal_Zoo()
	{
		return $this->Animal_Zoo_Name;
	}
}
 	$lion = new  Animal();
 	$amazonPark = new Animal();
 	$lion->set_Animal_name('LION');
 	$amazonPark->set_Animal_Zoo('Amazon Park');

 	echo $lion->get_Animal_name();
 	echo "<br>";
 	echo $amazonPark->get_Animal_Zoo();
 	?>

