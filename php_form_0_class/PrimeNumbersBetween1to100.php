<?php
  for ($i = 2; $i <= 100; $i++)
  {
    $num=0;
    for ($j=2; $j<=$i/2; $j++)
     {
      if($i % $j == 0)
      {
         $num++;
         break;
      }
    }
    if($num == 0)
    {
      echo $i."<br>";
    }
  }
  