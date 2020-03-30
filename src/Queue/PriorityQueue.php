<?php

namespace App\Queue;

use LengthException;
use SplFixedArray;

class PriorityQueue
{
    private SplFixedArray $items;
    private int $count = 0;

    public function __construct(int $length = 5)
    {
        $this->items = new \SplFixedArray($length);
    }

    public function insert($value)
    {
        if ($this->isFull()) {
            throw new LengthException();
        }

        $this->items[$this->shiftItemsToInsert($value)] = $value;
        $this->count++;

        //print_r($this->count);
        print_r($this->items);
    }

    public function shiftItemsToInsert($value)
    {
        for ($i = $this->count - 1; $i >= 0; $i--) {
            if ($this->items[$i] > $value) {
                $this->items[$i + 1] = $this->items[$i];
            } else {
                break;
            }
        }

        return $i + 1;
    }

    public function remove()
    {
        if ($this->isEmpty()) {
            throw new LengthException();
        }

        return $this->items[--$this->count];
    }

    public function isFull()
    {
        return $this->count === $this->items->getSize();
    }

    public function isEmpty()
    {
        return $this->count === 0;
    }

    public function toArray()
    {
        return $this->items;
    }
}
