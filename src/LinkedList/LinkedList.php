<?php

declare(strict_types=1);

namespace App\LinkedList;

use App\Traits\HasNodes;

class LinkedList
{
    use HasNodes;

    private ?Node $first = null;
    private ?Node $last = null;

    public function first()
    {
        return $this->first;
    }

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

        $this->deleteNode($this->first);

        return $value;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return;
        }

        $value = $this->last->value();

        $this->deleteNode($this->last);

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

    public function isEmpty()
    {
        return ! $this->first;
    }

    protected function getPrevious($node)
    {
        $current = $this->first;
        $previous = null;

        while ($current !== $node) {
            $previous = $current;
            $current = $current->next();
        }

        return $previous;
    }

    public function remove($node)
    {
        $this->deleteNode($node);
    }

    protected function deleteNode($node)
    {
        $previous = $this->getPrevious($node);

        if ($node === $this->last) {
            $this->last = $previous;
        }

        if (! $previous) {
            $this->first = null;

            return;
        }

        $previous->setNext($node->next());
    }
}
