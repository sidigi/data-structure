<?php

namespace App\Tree;

class Tree
{
    private ?Node $root = null;

    public function insert(int $value)
    {
        $node = new Node($value);

        if (! $this->root) {
            $this->root = $node;

            return;
        }

        $current = $this->root;

        while (true) {
            if ($value < $current->value()) {
                if (! $current->left()) {
                    $current->setLeft($node);
                    break;
                }
                $current = $current->left();
            } else {
                if (! $current->right()) {
                    $current->setRight($node);
                    break;
                }
                $current = $current->right();
            }
        }
    }

    public function find(int $value)
    {
        $current = $this->root;

        while ($current) {
            if ($value === $current->value()) {
                return true;
            }

            $current = $value > $current->value()
                ? $current->right()
                : $current->left();
        }

        return false;
    }

    public function traversePreOrder()
    {
        return $this->_traversePreOrder($this->root);
    }

    public function traversePostOrder()
    {
        return $this->_traversePostOrder($this->root);
    }

    public function traverseInOrder()
    {
        return $this->_traverseInOrder($this->root);
    }

    public function height()
    {
        return $this->_height($this->root);
    }

    public function min()
    {
        return $this->_min($this->root);
    }

    private function _min(Node $root)
    {
        if (! $root) {
            return;
        }

        if ($root->isLeaf()) {
            return $root->value();
        }

        return min($this->_min($root->left()), $this->_min($root->right()), $root->value());
    }

    private function _height(Node $root)
    {
        if (! $root) {
            return -1;
        }

        if ($root->isLeaf()) {
            return 0;
        }

        return 1 + max($this->_height($root->left()), $this->_height($root->right()));
    }

    private function _traversePreOrder(?Node $root)
    {
        if ($root) {
            $result = [$root->value()];
            $result = array_merge($result, $this->_traversePreOrder($root->left()));
            $result = array_merge($result, $this->_traversePreOrder($root->right()));
        }

        return $result ?? [];
    }

    private function _traversePostOrder(?Node $root)
    {
        if ($root) {
            $result = $this->_traversePreOrder($root->left());
            $result = array_merge($result, [$root->value()]);
            $result = array_merge($result, $this->_traversePreOrder($root->right()));
        }

        return $result ?? [];
    }

    private function _traverseInOrder(?Node $root)
    {
        if ($root) {
            $result = $this->_traversePreOrder($root->left());
            $result = array_merge($result, $this->_traversePreOrder($root->right()));
            $result = array_merge($result, [$root->value()]);
        }

        return $result ?? [];
    }
}
