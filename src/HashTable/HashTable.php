<?php

namespace App\HashTable;

use App\LinkedList\LinkedList;
use SplFixedArray;

class HashTable
{
    private SplFixedArray $items;

    public function __construct(int $length = 5)
    {
        $this->items = new \SplFixedArray($length);

        foreach ($this->items as $key => $value) {
            $this->items[$key] = new LinkedList;
        }
    }

    public function put(int $key, string $value) : void
    {
        $entry = $this->getEntry($key);

        if ($entry = $this->getEntry($key)) {
            $entry->value()->setValue($value);

            return;
        }

        $bucket = $this->getBucket($key);
        $bucket->addLast(new KeyValuePair($key, $value));
    }

    public function get(int $key) : ?string
    {
        $entry = $this->getEntry($key);

        return $entry ? $entry->value()->value() : null;
    }

    public function remove(int $key)
    {
        $bucket = $this->getBucket($key);

        if ($bucket->isEmpty()) {
            return;
        }

        $bucket->remove($this->getEntry($key));
    }

    private function getEntry(int $key)
    {
        $bucket = $this->getBucket($key);

        if ($bucket->isEmpty()) {
            return;
        }

        $currentNode = $bucket->first();
        while ($currentNode) {
            $keyValuePair = $currentNode->value();
            if ($keyValuePair->key() === $key) {
                return $currentNode;
            }
            $currentNode = $currentNode->next();
        }
    }

    private function getBucket($key)
    {
        $index = $this->hashIndex($key);

        return $this->items[$index];
    }

    private function eachInBucket(LinkedList $bucket, callable $callback)
    {
        $currentNode = $bucket->first();
        while ($currentNode) {
            $keyValuePair = $currentNode->value();
            $callback($keyValuePair);
            $currentNode = $currentNode->next();
        }
    }

    private function hashIndex(int $key)
    {
        return $key % $this->items->getSize();
    }
}
