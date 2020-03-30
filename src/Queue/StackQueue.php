<?php

namespace App\Queue;

use App\Stack\Stack;

class StackQueue
{
    private Stack $stack1;
    private Stack $stack2;

    public function __construct()
    {
        $this->stack1 = new Stack;
        $this->stack2 = new Stack;
    }

    public function endqueue($value)
    {
        $this->stack1->push($value);
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Empty');
        }

        $this->moveStackOneToStack2();

        return $this->stack2->pop();
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Empty');
        }

        $this->moveStackOneToStack2();

        return $this->stack2->peek();
    }

    private function moveStackOneToStack2()
    {
        if ($this->stack2->isEmpty()) {
            while (! $this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }
    }

    public function isEmpty()
    {
        return $this->stack1->isEmpty() && $this->stack2->isEmpty();
    }

    public function toArray()
    {
        return $this->stack2->toArray();
    }
}
