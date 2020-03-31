<?php

use App\HashTable\HashTable;

require __DIR__.'/../vendor/autoload.php';

$hashTable = new HashTable;
$hashTable->put(1, 'One');
$hashTable->put(2, 'Two');
$hashTable->put(6, 'Six');
//$hashTable->put(6, 'Six2');
//$hashTable->remove(6);
print_r($hashTable->get(6));
//print_r($hashTable);
