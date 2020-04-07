<?php

namespace App\AVLTree;

class AVLNode
{
    private ?int $value;
    private int $height = 0;
    private ?AVLNode $leftChild = null;
    private ?AVLNode $rightChild = null;

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

    public function setHeight(int $value)
    {
        $this->height = $value;
    }

    public function left()
    {
        return $this->leftChild;
    }

    public function height()
    {
        return $this->height;
    }

    public function right()
    {
        return $this->rightChild;
    }

    public function setLeft(?self $node)
    {
        $this->leftChild = $node;
    }

    public function setRight(?self $node)
    {
        $this->rightChild = $node;
    }

    public function isLeaf()
    {
        return ! $this->rightChild && ! $this->leftChild;
    }
}
