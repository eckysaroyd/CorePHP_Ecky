<?php
class fruits
{
	public $orange;
	public $mango;

	function __construct($orange)
	{
		$this->orange=$orange;
	}
	function get_orange()
	{
		return $this->orange;
	}
}
	 $red_orange=new fruits('oranges');
	 echo $red_orange->get_orange();