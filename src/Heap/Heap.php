<?php

namespace App\Heap;

class Heap
{
    private array $items = [];
    private int $size = 0;

    public function insert(int $value)
    {
        $this->items[$this->size++] = $value;

        $this->bubbleUp();
    }

    private function bubbleUp()
    {
        $index = $this->size - 1;

        while ($index > 0 && $this->items[$index] > $this->items[$this->parent($index)]) {
            $this->swap($index, $this->parent($index));
            $index = $this->parent($index);
        }
    }

    private function bubbleDown()
    {
        $index = 0;

        while ($index <= $this->size && ! $this->isValidParent($index)) {
            $largerChildIndex = $this->largerChildIndex($index);
            $this->swap($index, $largerChildIndex);
            $index = $largerChildIndex;
        }
    }

    private function swap(int $first, int $second)
    {
        $tmp = $this->items[$first];
        $this->items[$first] = $this->items[$second];
        $this->items[$second] = $tmp;
    }

    private function parent($index)
    {
        return ($index - 1) / 2;
    }

    private function leftChildIndex(int $index)
    {
        return $index * 2 + 1;
    }

    private function leftChild(int $index)
    {
        return $this->items[$this->leftChildIndex($index)];
    }

    private function hasLeftChild(int $index)
    {
        return $this->leftChildIndex($index) <= $this->size;
    }

    private function hasRightChild(int $index)
    {
        return $this->rightChildIndex($index) <= $this->size;
    }

    private function rightChildIndex(int $index)
    {
        return $index * 2 + 2;
    }

    private function rightChild(int $index)
    {
        return $this->items[$this->rightChildIndex($index)];
    }

    private function isValidParent(int $index)
    {
        if (! $this->hasLeftChild($index)) {
            return true;
        }

        $isValid = $this->items[$index] >= $this->leftChild($index);

        if ($this->hasRightChild($index)) {
            $isValid = $isValid && $this->items[$index] >= $this->rightChild($index);
        }

        return $isValid;
    }

    private function largerChildIndex(int $index)
    {
        if (! $this->hasLeftChild($index)) {
            return $index;
        }

        if (! $this->hasRightChild($index)) {
            return $this->leftChildIndex($index);
        }

        return ($this->leftChild($index) > $this->rightChild($index))
            ? $this->leftChildIndex($index)
            : $this->rightChildIndex($index);
    }

    public function remove()
    {
        $return = $this->items[0];
        $this->items[0] = $this->items[--$this->size];
        $this->bubbleDown();

        return $return;
    }
}
