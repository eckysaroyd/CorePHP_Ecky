<?php
abstract class cars{
	public $name;
	function __construct($name)
	{
		$this->name=$name;
	}
	abstract function intro() : string;

	}
	class audi extends cars{
		function intro() : string{
			return "i like {$this->name} car";
		}
	}
	class volvo extends cars{
		function intro() : string
		{
			return "i like also {$this->name} car";
		}
	}

$audi= new audi('audi');
echo $audi->intro();
echo '<br>';

$volvo= new volvo('volvo');
echo $volvo->intro();
echo '<br>';
?>