<?php
function CheckIfNoIsPrimeOrNot($num){
  if ($num == 1)
    { 
      return 0;
    }
  for ($i = 2; $i <= $num/2; $i++){
    if ($num % $i == 0)
     {
      return 0;
    }
  }
  return 1;
}
$num = 31;
$flag = CheckIfNoIsPrimeOrNot($num);
if ($flag == 1)
  echo "Number is Prime";
else
  echo "Number is Not Prime"
?>
