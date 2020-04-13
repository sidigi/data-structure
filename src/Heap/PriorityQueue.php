<?php

namespace App\Heap;

class PriorityQueue
{
    private Heap $heap;

    public function __construct()
    {
        $this->heap = new Heap();
    }

    public function enqueue(int $item) : void
    {
        $this->heap->insert($item);
    }

    public function dequeue() : int
    {
        return $this->heap->remove();
    }

    public function isEmpty() : bool
    {
        return $this->heap->isEmpty();
    }
}
