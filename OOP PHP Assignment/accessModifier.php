<?php
//public scope to make that property/method available from anywhere, other classes and instances of the object.

//private scope when you want your property/method to be visible in its own class only.

//protected scope when you want to make your property/method visible in all classes that extend current class including the parent class.

class GrandPas   // The Grandfather's class
{
    public     $name1 = 'Mark Henry';  // This grandpa is mapped to a public modifier
    protected  $name2 = 'John Clash';  // This grandpa is mapped to a protected modifier
    private    $name3 = 'Will Jones';  // This grandpa is mapped to a private modifier
}

$granpaWithoutReflections = new GrandPas;
print_r($granpaWithoutReflections);
?>