<?php

namespace App\Graph;

use Exception;
use SplDoublyLinkedList;

class Graph
{
    private array $nodes = [];

    public function addNode(string $label)
    {
        if (! isset($this->nodes[$label])) {
            $this->nodes[$label] = new SplDoublyLinkedList;
        }
    }

    public function removeNode(string $label)
    {
        if (! isset($this->nodes[$label])) {
            return;
        }

        foreach ($this->nodes as $key => $list) {
            foreach ($list as $index => $node) {
                if ($node === $label) {
                    $list->offsetUnset($index);
                }
            }
        }

        unset($this->nodes[$label]);
    }

    public function addEdge(string $from, string $to)
    {
        if (! isset($this->nodes[$from]) || ! isset($this->nodes[$to])) {
            throw new Exception('offset');
        }

        $this->nodes[$from]->push($to);
    }

    public function removeEdge(string $from, string $to)
    {
        if (! isset($this->nodes[$from]) || ! isset($this->nodes[$to])) {
            return;
        }

        foreach ($this->nodes[$from] as $index => $node) {
            if ($node === $to) {
                $this->nodes[$from]->offsetUnset($index);
            }
        }
    }

    public function traverse(string $label)
    {
        $node = $this->nodes[$label] ?? null;
        if (! $node) {
            return;
        }

        $stack = [];
        $stack[] = $label;

        $visited = [];

        while ($stack) {
            $current = array_pop($stack);

            if (in_array($current, array_keys($visited))) {
                continue;
            }

            print_r($current);
            $visited[$current] = 1;

            foreach ($this->nodes[$current] as $neigbour) {
                if (! in_array($neigbour, array_keys($visited))) {
                    $stack[] = $neigbour;
                }
            }
        }
    }

    public function traverseQueue(string $label)
    {
        $node = $this->nodes[$label] ?? null;
        if (! $node) {
            return;
        }

        $queue = [];
        $queue[] = $label;

        $visited = [];

        while ($queue) {
            $current = array_shift($queue);

            if (in_array($current, array_keys($visited))) {
                continue;
            }

            print_r($current);
            $visited[$current] = 1;

            foreach ($this->nodes[$current] as $neigbour) {
                if (! in_array($neigbour, array_keys($visited))) {
                    $queue[] = $neigbour;
                }
            }
        }
    }

    public function print()
    {
        foreach ($this->nodes as $key => $list) {
            $result = [];

            foreach ($list as $index => $node) {
                $result[] = $node;
            }

            if ($result) {
                print_r($key.' is connected with ['.implode(', ', $result).']'.PHP_EOL);
            }
        }
    }
}
