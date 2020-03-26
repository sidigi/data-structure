<?php

declare(strict_types=1);

namespace App\DoubleLinkedList;

use App\Traits\HasNodes;

class DoubleLinkedList
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
        $this->first->setPrevious($node);
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
        $node->setPrevious($this->last);
        $this->last = $node;
    }

    public function shift()
    {
        if ($this->isEmpty()) {
            return;
        }

        $value = $this->first->value();

        $this->first = $this->first->next();

        $this->first->setPrevious(null);

        return $value;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return;
        }

        $value = $this->last->value();

        $previous = $this->last->previous();
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
            $current->setPrevious($next);
            $previous = $current;
            $current = $next;
        }

        $this->first = $previous;
        $previous->setPrevious(null);
        $this->last->setNext(null);
    }

    protected function deleteNode($node)
    {
        if ($node === $this->first) {
            $this->first = $node->next();
            $node->setPrevious(null);

            return;
        }

        $previous = $node->previous();

        $previous->setNext($node->next());
        $previous->setPrevious($node);
    }
}
