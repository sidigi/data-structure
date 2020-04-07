<?php

use App\Heap\Heap;

require __DIR__.'/../vendor/autoload.php';

$heap = new Heap;
$heap->insert(10);
$heap->insert(5);
$heap->insert(17);
print_r($heap);
