<?php

namespace App\Queue;

use App\LinkedList\LinkedList;

class Queue
{
    private LinkedList $linkedList;

    public function __construct()
    {
        $this->linkedList = new LinkedList;
    }

    public function add($value)
    {
        $this->linkedList->addFirst($value);
    }

    public function remove()
    {
        return $this->linkedList->pop();
    }

    public function reverse()
    {
        $stack = new LinkedList;

        while (! $this->isEmpty()) {
            $value = $this->remove();
            $stack->addFirst($value);
        }

        $this->linkedList = $stack;
    }

    public function isEmpty()
    {
        return $this->linkedList->isEmpty();
    }

    public function toArray()
    {
        return $this->linkedList->toArray();
    }
}
