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

        $value = $this->last->value();

        $previous = $this->getPrevious($this->last);
        $previous->setNext(null);
        $this->last = null;

        return $value;
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

        $node = $this->first(static function (Node $item, $i) use ($nth) {
            return $nth === $i;
        });

        if ($node) {
            return $node->value();
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

    public function delete(int $value, $all = false)
    {
        if (! $all) {
            $node = $this->first(static function (Node $item) use ($value) {
                return $item->value() === $value;
            });

            if ($node) {
                $this->deleteNode($node);
            }

            return;
        }

        $this->each(function (Node $item) use ($value) {
            if ($item->value() === $value) {
                $this->deleteNode($item);
            }
        });
    }

    public function deleteByIndex(int $index)
    {
        $node = $this->first(static function (Node $item, $i) use ($index) {
            return $index === $i;
        });

        if ($node) {
            $this->deleteNode($node);
        }
    }

    public function toArray()
    {
        return $this->map(static function (Node $item) {
            return $item->value();
        });
    }

    public function isEmpty()
    {
        return ! $this->first;
    }

    private function getPrevious(Node $node)
    {
        $current = $this->first;
        while ($current !== $node) {
            $previous = $current;
            $current = $current->next();
        }

        return $previous;
    }

    private function deleteNode(Node $node)
    {
        if ($node === $this->first) {
            $this->first = $node->next();

            return;
        }

        $previous = $this->getPrevious($node);
        $previous->setNext($node->next());
    }

    private function each(callable $callback)
    {
        $current = $this->first;
        $index = 0;

        while ($current) {
            $callback($current, $index);
            $current = $current->next();
            $index++;
        }
    }

    private function map(callable $callback)
    {
        $result = [];

        $this->each(function (Node $item, $index) use (&$result, $callback) {
            $result[] = $callback($item, $index);
        });

        return $result;
    }

    private function first(callable $callback)
    {
        $current = $this->first;
        $index = 0;

        while ($current) {
            if ($callback($current, $index)) {
                return $current;
            }
            $current = $current->next();
            $index++;
        }
    }
}
