<?php

use App\Tree\Tree;

require __DIR__.'/../vendor/autoload.php';

$tree1 = new Tree;
$tree1->insert(7);
$tree1->insert(4);
$tree1->insert(9);
$tree1->insert(1);
$tree1->insert(6);
$tree1->insert(8);
$tree1->insert(10);
//var_dump($tree1->isBinarySearch());
$tree1->traverseLevelOrder();
