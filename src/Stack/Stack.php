<?php

namespace App\Stack;

use App\LinkedList\LinkedList;

class Stack
{
    private LinkedList $linkedList;

    public function __construct()
    {
        $this->linkedList = new LinkedList;
    }

    public function push($value)
    {
        $this->linkedList->addLast($value);
    }

    public function pop()
    {
        return $this->linkedList->pop();
    }

    public function peek()
    {
        return $this->linkedList->peek();
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
