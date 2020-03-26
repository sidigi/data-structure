<?php

namespace App;

use InvalidArgumentException;

class FixedLengthArray
{
    protected $items;
    protected $count = 0;

    public function __construct(int $length)
    {
        $this->items = new \SplFixedArray($length);
    }

    public function insert($value)
    {
        if ($this->items->count() === $this->count) {
            $newItems = new \SplFixedArray($this->count * 2);

            for ($i = 0; $i < $this->count; $i++) {
                $newItems[$i] = $this->items[$i];
            }

            $this->items = $newItems;
        }

        $this->items[$this->count++] = $value;
    }

    public function removeAt(int $index)
    {
        if ($index < 0 || $index >= $this->count) {
            throw new InvalidArgumentException;
        }

        for ($i = $index; $i < $this->count - 1; $i++) {
            $this->items[$i] = $this->items[$i + 1];
        }

        $this->count--;
    }

    public function indexOf(int $value)
    {
        for ($i = 0; $i < $this->count; $i++) {
            if ($this->items[$i] === $value) {
                return $i;
            }
        }

        return -1;
    }

    public function print()
    {
        for ($i = 0; $i < $this->count; $i++) {
            var_dump($this->items[$i]);
        }
    }
}
