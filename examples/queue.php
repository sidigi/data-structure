<?php

use App\Queue\ArrayQueue;
use App\Queue\PriorityQueue;
use App\Queue\Queue;
use App\Queue\StackQueue;

require __DIR__.'/../vendor/autoload.php';

//reverse
/*$queue = new Queue;
$queue->add(10);
$queue->add(20);
$queue->add(30);
$queue->reverse();
print_r($queue);*/

//Array queue
/*$queue = new ArrayQueue;
$queue->endqueue(10);
$queue->endqueue(20);
$queue->endqueue(30);
$queue->endqueue(40);
$queue->endqueue(50);
$queue->dequeue();
$queue->dequeue();
$queue->endqueue(60);
$queue->endqueue(70);
print_r($queue->toArray());*/

//Stack queue
/*$queue = new StackQueue;
$queue->endqueue(10);
$queue->endqueue(20);
$queue->endqueue(30);
print_r($queue->dequeue());
print_r($queue->dequeue());
$queue->endqueue(40);
print_r($queue->toArray());*/

//Priority queue
$queue = new PriorityQueue;
$queue->insert(5);
$queue->insert(2);
$queue->insert(3);
//print_r($queue->toArray());
