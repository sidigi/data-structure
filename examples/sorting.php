<?php

use App\Sorting\CountingSort;
use App\Sorting\InsertionSort;
use App\Sorting\MergeSort;
use App\Sorting\QuickSort;

require __DIR__.'/../vendor/autoload.php';

/*$sorting = new InsertionSort();
print_r($sorting->sort([8, 2, 4, 1, 3]));*/

/*$sorting = new MergeSort();
$sort = [8, 2, 4, 1, 3];
$sorting->sort($sort);
print_r($sort);*/

/*$sorting = new QuickSort();
$sort = [15, 6, 3, 1, 22, 10, 13];
$sorting->sort($sort);
print_r($sort);*/

$sorting = new CountingSort();
print_r($sorting->sort([15, 6, 3, 1, 22, 10, 13]));
