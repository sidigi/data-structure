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

        $this->setHeight($node);

        return  $this->balance($node);
    }

    private function balance(?AVLNode $node)
    {
        if ($this->isLeftHeavy($node)) {
            if ($this->balanceFactor($node->left()) < 0) {
                $node->setLeft(
                    $this->leftRotate($node->left())
                );
            }

            return $this->rightRotate($node);
        } elseif ($this->isRightHeavy($node)) {
            if ($this->balanceFactor($node->right()) > 0) {
                $node->setRight(
                    $this->rightRotate($node->right())
                );
            }

            return $this->leftRotate($node);
        }

        return $node;
    }

    private function leftRotate(?AVLNode $node)
    {
        $newNode = $node->right();
        $node->setRight($newNode->left());
        $newNode->setLeft($node);

        $this->setHeight($node);
        $this->setHeight($newNode);

        return $newNode;
    }

    private function rightRotate(?AVLNode $node)
    {
        $newNode = $node->left();
        $node->setLeft($newNode->right());
        $newNode->setRight($node);

        $this->setHeight($node);
        $this->setHeight($newNode);

        return $newNode;
    }

    private function setHeight(?AVLNode $node)
    {
        $height = max($this->height($node->left()), $this->height($node->right())) + 1;
        $node->setHeight($height);
    }

    private function height(?AVLNode $node)
    {
        return ($node) ? $node->height() : -1;
    }

    private function balanceFactor(?AVLNode $node) : int
    {
        return $node ? $this->height($node->left()) - $this->height($node->right()) : 0;
    }

    private function isLeftHeavy(?AVLNode $node) : bool
    {
        return $this->balanceFactor($node) > 1;
    }

    private function isRightHeavy(?AVLNode $node) : bool
    {
        return $this->balanceFactor($node) < -1;
    }
}
