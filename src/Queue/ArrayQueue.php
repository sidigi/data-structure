<?php

namespace App\Queue;

use LengthException;
use SplFixedArray;

class ArrayQueue
{
    private SplFixedArray $items;
    private int $front = 0;
    private int $rear = 0;
    private int $count = 0;

    public function __construct(int $length = 5)
    {
        $this->items = new \SplFixedArray($length);
    }

    public function endqueue($value)
    {
        if ($this->isFull()) {
            throw new LengthException;
        }

        $this->items[$this->rear] = $value;
        $this->rear = ($this->rear + 1) % $this->length();
        $this->count++;
    }

    public function dequeue()
    {
        $value = $this->items[$this->front];
        $this->items[$this->front] = 0;
        $this->front = ($this->front + 1) % $this->length();
        $this->count--;

        return $value;
    }

    public function peek()
    {
        return $this->items[$this->count];
    }

    public function isEmpty()
    {
        return $this->count === 0;
    }

    public function isFull()
    {
        return $this->count === $this->items->getSize();
    }

    private function length()
    {
        return $this->items->getSize();
    }

    public function toArray()
    {
        return $this->items;
    }
}
