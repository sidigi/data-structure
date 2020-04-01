<?php

use App\AVLTree\AVLTree;

require __DIR__.'/../vendor/autoload.php';

$tree1 = new AVLTree;
$tree1->insert(7);
$tree1->insert(4);
$tree1->insert(9);
$tree1->insert(1);
$tree1->insert(6);
$tree1->insert(8);
$tree1->insert(10);
print_r($tree1);
