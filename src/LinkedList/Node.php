<?php

declare(strict_types=1);

namespace App\LinkedList;

class Node
{
    private $value;
    private ?Node $next = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function next()
    {
        return $this->next;
    }

    public function value()
    {
        return $this->value;
    }

    public function setNext(?self $next)
    {
        $this->next = $next;
    }
}
