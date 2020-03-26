<?php

declare(strict_types=1);

namespace App\LinkedList;

class LinkedList
{
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

        $current = $this->first;
        while ($current !== $this->last) {
            $previous = $current;
            $current = $current->next();
        }

        $previous->setNext(null);
        $this->last = null;

        return $current->value();
    }

    public function indexOf($value, bool $strict = false)
    {
        if ($this->isEmpty()) {
            return;
        }

        $current = $this->first;
        $index = 0;
        while ($current) {
            if ($strict && $current->value() === $value) {
                return $index;
            }

            if (! $strict && $current->value() == $value) {
                return $index;
            }

            $current = $current->next();
            $index++;
        }

        return -1;
    }

    public function contains($value, bool $strict = false)
    {
        return $this->indexOf($value, $strict) > -1;
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

    public function nthFromFirst(int $nth)
    {
        if ($this->isEmpty()) {
            return;
        }

        $current = $this->first;
        $index = 0;
        while ($current) {
            if ($index === $nth) {
                return $current->value();
            }

            $current = $current->next();
            $index++;
        }
    }

    public function nthFromEnd(int $nth)
    {
        if ($this->isEmpty() || $nth < 0) {
            return;
        }

        $first = $this->first;
        $second = $this->first->next();

        for ($i = 0; $i <= $nth - 1; $i++) {
            if (! $second) {
                return;
            }

            $second = $second->next();
        }

        while ($second) {
            $first = $first->next();
            $second = $second->next();
        }

        return $first->value();
    }

    public function toArray()
    {
        $current = $this->first;

        $items = [];
        while ($current) {
            $items[] = $current->value();
            $current = $current->next();
        }

        return $items;
    }

    public function isEmpty()
    {
        return ! $this->first;
    }
}
