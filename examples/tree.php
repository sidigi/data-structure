<?php

use App\Tree\Tree;

require __DIR__.'/../vendor/autoload.php';

$tree = new Tree;
$tree->insert(7);
$tree->insert(4);
$tree->insert(9);
$tree->insert(1);
$tree->insert(6);
$tree->insert(8);
$tree->insert(10);
print_r($tree->traversePreOrder());
print_r($tree->traversePostOrder());
print_r($tree->traverseInOrder());
print_r($tree->height());
print_r($tree->min());
//var_dump($tree);
