<?php

namespace App\Trie;

class Node
{
    public ?string $char;
    public array $children = [];
    public bool $isEndOfWord = false;

    public function __construct(?string $char)
    {
        $this->char = $char;
    }

    public function hasChild(string $char) : bool
    {
        return isset($this->children[$char]);
    }

    public function addChild(string $char) : void
    {
        $this->children[$char] = new self($char);
    }

    public function deleteChild(string $char) : void
    {
        unset($this->children[$char]);
    }

    public function getChild(string $char) : ?self
    {
        return $this->children[$char] ?? null;
    }

    public function getChildren() : array
    {
        return $this->children;
    }

    public function hasChildren() : bool
    {
        return empty($this->children);
    }
}
