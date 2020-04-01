<?php

namespace App\AVLTree;

class AVLTree
{
    private ?AVLNode $root = null;

    public function insert(int $value)
    {
        $this->root = $this->_insert($this->root, $value);
    }

    private function _insert(?AVLNode $node, int $value)
    {
        if (! $node) {
            return new AVLNode($value);
        }

        if ($value < $node->value()) {
            $node->setLeft($this->_insert($node->left(), $value));
        } else {
            $node->setRight($this->_insert($node->right(), $value));
        }

        $height = max($this->height($node->left()), $this->height($node->right())) + 1;
        $node->setHeight($height + 1);

        return $node;
    }

    private function height(AVLNode $node)
    {
        return ($node) ? $node->height() : -1;
    }
}
