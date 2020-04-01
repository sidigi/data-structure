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

    public function equals(?self $tree)
    {
        if (! $tree) {
            return false;
        }

        return $this->_equals($tree->root, $this->root);
    }

    public function isBinarySearch()
    {
        return $this->_isBinarySearch($this->root, PHP_INT_MIN, PHP_INT_MAX);
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

    public function nodesAtDistance(int $distance)
    {
        return $this->_nodesAtDistance($this->root, $distance);
    }

    public function traverseLevelOrder()
    {
        for ($i = 0; $i <= $this->height(); $i++) {
            foreach ($this->nodesAtDistance($i) as $item) {
                var_dump($item);
            }
        }
    }

    private function _nodesAtDistance(?Node $node, int $distance)
    {
        if (! $node) {
            return [];
        }

        if ($distance === 0) {
            return [$node->value()];
        }

        return array_merge(
            $this->_nodesAtDistance($node->left(), $distance - 1),
            $this->_nodesAtDistance($node->right(), $distance - 1)
        );
    }

    private function _isBinarySearch(?Node $node, int $min, int $max)
    {
        if (! $node) {
            return true;
        }

        if ($min > $node->value() || $node->value() > $max) {
            return false;
        }

        return $this->_isBinarySearch($node->left(), $min, $node->value() - 1)
            && $this->_isBinarySearch($node->right(), $node->value() + 1, $max);
    }

    private function _equals(?Node $node1, ?Node $node2)
    {
        if (! $node1 && ! $node2) {
            return true;
        }

        if ($node1 && $node2) {
            return $node1->value() === $node2->value()
                && $this->_equals($node1->left(), $node2->left())
                && $this->_equals($node1->right(), $node2->right());
        }

        return false;
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
            $result = array_merge(
                [$root->value()],
                $this->_traversePreOrder($root->left()),
                $this->_traversePreOrder($root->right())
            );
        }

        return $result ?? [];
    }

    private function _traversePostOrder(?Node $root)
    {
        if ($root) {
            $result = array_merge(
                $this->_traversePreOrder($root->left()),
                [$root->value()],
                $this->_traversePreOrder($root->right())
            );
        }

        return $result ?? [];
    }

    private function _traverseInOrder(?Node $root)
    {
        if ($root) {
            $result = array_merge(
                $this->_traversePreOrder($root->left()),
                $this->_traversePreOrder($root->right()),
                [$root->value()]
            );
        }

        return $result ?? [];
    }
}
