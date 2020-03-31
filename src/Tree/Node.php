<?php

namespace App\Tree;

class Node
{
    private ?int $value;
    private ?Node $leftChild = null;
    private ?Node $rightChild = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function setValue(int $value)
    {
        $this->value = $value;
    }

    public function left()
    {
        return $this->leftChild;
    }

    public function right()
    {
        return $this->rightChild;
    }

    public function setLeft(self $node)
    {
        $this->leftChild = $node;
    }

    public function setRight(self $node)
    {
        $this->rightChild = $node;
    }

    public function isLeaf()
    {

        return ! $this->rightChild && ! $this->leftChild;
    }
}
