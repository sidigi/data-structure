<?php

use App\Str\Str;
use App\Str\Utils;

require __DIR__.'/../vendor/autoload.php';

//reverse
/*$str = new Str();
print_r($str->reverse('abcdefg'));*/

//balance
/*$str = new Str();
var_dump($str->isBalanced('sdf))))'));*/

//unrepeated char
// $str = new Str();
// var_dump($str->firstUnrepeatedChar('a green apple'));
// var_dump($str->firstRepeatedChar('a green apple'));

$str = new Utils();
// print_r(Utils::countVowels('a dfsa sdfagfdg'));
//print_r(Utils::reverse('a dfsa sdfagfdg'));
//print_r(Utils::reverseWords('a dfsa sdfagfdg'));
print_r(Utils::removeDuplicates('aa aa sdfagfdg'));
