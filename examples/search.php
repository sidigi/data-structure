<?php

use App\Search\Search;

require __DIR__.'/../vendor/autoload.php';

/*$search = new Search;
print_r($search->linear([1, 2, 3], 2));*/

$search = new Search;
//print_r($search->binary([1, 2, 3], 2));
//print_r($search->binaryIterate([1, 2, 3], 2));
//print_r($search->ternary([1, 2, 3, 5, 6], 5));
//print_r($search->jump([1, 2, 3, 5, 6], 5));
print_r($search->exponential([1, 2, 3, 5, 6], 5));
