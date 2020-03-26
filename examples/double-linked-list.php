<?php

use App\DoubleLinkedList\DoubleLinkedList;

require __DIR__.'/../vendor/autoload.php';

//add first
/*$list = new DoubleLinkedList();
$list->addFirst(1);
$list->addFirst(2);
$list->addFirst(3);
print_r($list->toArray());*/

//add last
/*$list = new DoubleLinkedList();
$list->addLast(1);
$list->addLast(2);
$list->addLast(3);
print_r($list->toArray());*/

//shift
/*$list = new DoubleLinkedList();
$list->addLast(1);
$list->addLast(2);
$list->addLast(3);
print_r($list->shift());
print_r($list->toArray());*/

//pop
/*$list = new DoubleLinkedList();
$list->addLast(1);
$list->addLast(2);
$list->addLast(3);
print_r($list->pop());
print_r($list->toArray());*/

//reverse
/*$list = new DoubleLinkedList();
$list->addLast(1);
$list->addLast(2);
$list->addLast(3);
$list->reverse();
print_r($list->toArray());*/

//nth from start
/*$list = new DoubleLinkedList();
$list->addLast(5);
$list->addLast(4);
$list->addLast(3);
$list->addLast(2);
$list->addLast(1);
var_dump($list->nthFromFirst(2));*/

//nth from end
/*$list = new DoubleLinkedList();
$list->addLast(5);
$list->addLast(4);
$list->addLast(3);
$list->addLast(2);
$list->addLast(1);
var_dump($list->nthFromEnd(0));*/

//delete
$list = new DoubleLinkedList();
$list->addLast(5);
$list->addLast(2);
$list->addLast(4);
$list->addLast(3);
$list->addLast(2);
$list->addLast(2);
$list->addLast(1);
$list->delete(2, true);
print_r($list->toArray());

//delete by index
/*$list = new DoubleLinkedList();
$list->addLast(5);
$list->addLast(2);
$list->addLast(4);
$list->deleteByIndex(1);
print_r($list->toArray());*/
