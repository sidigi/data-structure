<?php

use App\Trie\Trie;

require __DIR__.'/../vendor/autoload.php';

$trie = new Trie;

$trie->insert('car');
$trie->insert('card');
$trie->insert('careful');
$trie->insert('egg');
print_r($trie->findWords('car'));
//$trie->traverse();
//print_r($trie);
