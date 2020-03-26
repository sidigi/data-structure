<?php

declare(strict_types=1);

namespace App\Traits;

trait HasNodes
{
    public function toArray()
    {
        return $this->map(static function ($item) {
            return $item->value();
        });
    }

    public function isEmpty()
    {
        return ! $this->first;
    }

    protected function each(callable $callback)
    {
        $current = $this->first;
        $index = 0;

        while ($current) {
            $callback($current, $index);
            $current = $current->next();
            $index++;
        }
    }

    protected function map(callable $callback)
    {
        $result = [];

        $this->each(function ($item, $index) use (&$result, $callback) {
            $result[] = $callback($item, $index);
        });

        return $result;
    }

    protected function first(callable $callback)
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

    public function nthFromFirst(int $nth)
    {
        if ($this->isEmpty()) {
            return;
        }

        $node = $this->first(static function ($item, $i) use ($nth) {
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
            $node = $this->first(static function ($item) use ($value) {
                return $item->value() === $value;
            });

            if ($node) {
                $this->deleteNode($node);
            }

            return;
        }

        $this->each(function ($item) use ($value) {
            if ($item->value() === $value) {
                $this->deleteNode($item);
            }
        });
    }

    public function deleteByIndex(int $index)
    {
        $node = $this->first(static function ($item, $i) use ($index) {
            return $index === $i;
        });

        if ($node) {
            $this->deleteNode($node);
        }
    }
}
