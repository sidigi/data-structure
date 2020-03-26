<?php

declare(strict_types=1);

namespace App\LinkedList;

use App\Traits\HasNodes;

class LinkedList
{
    use HasNodes;

    private ?Node $first = null;
    private ?Node $last = null;

    public function addFirst($value)
    {
        $node = new Node($value);

        if ($this->isEmpty()) {
            $this->first = $this->last = $node;

            return;
        }

        $node->setNext($this->first);
        $this->first = $node;
    }

    public function addLast($value)
    {
        $node = new Node($value);

        if ($this->isEmpty()) {
            $this->first = $this->last = $node;

            return;
        }

        $this->last->setNext($node);
        $this->last = $node;
    }

    public function shift()
    {
        if ($this->isEmpty()) {
            return;
        }

        $value = $this->first->value();

        $this->first = $this->first->next();

        return $value;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return;
        }

        $value = $this->last->value();

        $previous = $this->getPrevious($this->last);
        $previous->setNext(null);
        $this->last = null;

        return $value;
    }

    public function reverse()
    {
        if ($this->isEmpty()) {
            return;
        }

        $previous = $this->last = $this->first;
        $current = $this->first->next();

        while ($current) {
            $next = $current->next();
            $current->setNext($previous);
            $previous = $current;
            $current = $next;
        }

        $this->first = $previous;
        $this->last->setNext(null);
    }

    protected function getPrevious($node)
    {
        $current = $this->first;
        while ($current !== $node) {
            $previous = $current;
            $current = $current->next();
        }

        return $previous;
    }

    protected function deleteNode($node)
    {
        if ($node === $this->first) {
            $this->first = $node->next();

            return;
        }

        $previous = $this->getPrevious($node);
        $previous->setNext($node->next());
    }
}
