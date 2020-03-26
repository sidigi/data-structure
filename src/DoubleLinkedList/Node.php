<?php

declare(strict_types=1);

namespace App\LinkedList;

class Node
{
    private int $value;
    private ?Node $previous = null;
    private ?Node $next = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function next()
    {
        return $this->next;
    }

    public function previous()
    {
        return $this->previous;
    }

    public function value()
    {
        return $this->value;
    }

    public function setNext(?self $next)
    {
        $this->next = $next;
    }

    public function setPrevious(?self $previous)
    {
        $this->previous = $previous;
    }
}
