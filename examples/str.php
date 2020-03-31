<?php

use App\Str\Str;

require __DIR__.'/../vendor/autoload.php';

//reverse
/*$str = new Str();
print_r($str->reverse('abcdefg'));*/

//balance
/*$str = new Str();
var_dump($str->isBalanced('sdf))))'));*/

//unrepeated char
$str = new Str();
var_dump($str->firstUnrepeatedChar('a green apple'));
var_dump($str->firstRepeatedChar('a green apple'));
