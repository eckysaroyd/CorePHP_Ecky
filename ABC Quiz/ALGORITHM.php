<?php
// function for kadane's algorithm
function kadaneAlgorithm($algorithm, $number) {
  $subTotal = 0;
  $current_sum = 0;
  for($i=0; $i<$number; $i++) {
    $current_sum = $current_sum + $algorithm[$i];
    
    if ($current_sum < 0)
      $current_sum = 0; 
    
    if($subTotal < $current_sum)
      $subTotal = $current_sum; 
  }
  return $subTotal;
}

// test the code
$totalNumbers = array(-3, 1, -8, 12, 0, -3, 5, -9, 4);
$number = sizeof($totalNumbers);
echo "Maximum SubArray is: ".kadaneAlgorithm($totalNumbers, $number);
?>
