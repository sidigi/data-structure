<?php

namespace App\HashTable;

class KeyValuePair
{
    private int $key;
    private string $value;

    public function __construct(int $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function key()
    {
        return $this->key;
    }
}
