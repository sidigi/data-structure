<?php

use App\Graph\Graph;

require __DIR__.'/../vendor/autoload.php';

$graph = new Graph;
$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('C');
$graph->addNode('D');

$graph->addEdge('A', 'B');
$graph->addEdge('B', 'D');
$graph->addEdge('D', 'C');
$graph->addEdge('A', 'C');
//print_r($graph);
$graph->traverseQueue('A');
