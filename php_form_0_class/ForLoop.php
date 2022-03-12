<?php
for($x=0; $x<=5; $x++)
{
  for($y=0; $y<=$x; $y++)
  {
    echo '*';
  }
  echo"<br>";
}
 echo"<br></br>";
echo "echo 'PHP version: ' ". phpversion(). "</br></br>";

?>

<?php
class simple{

  public $k = 9;

  public function display(){
    return $this->k;
  }
}

$obj = new simple();
echo $obj->display();

?>
