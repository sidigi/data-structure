<?php

namespace App\Trie;

class Trie
{
    private Node $node;

    public function __construct()
    {
        $this->node = new Node(null);
    }

    public function insert(string $word)
    {
        $current = $this->node;
        foreach (str_split($word) as $char) {
            if (! $current->hasChild($char)) {
                $current->addChild($char);
            }

            $current = $current->getChild($char);
        }

        $current->isEndOfWord = true;
    }

    public function contains(string $word)
    {
        $current = $this->node;
        foreach (str_split($word) as $char) {
            if (! $current->hasChild($char)) {
                return false;
            }

            $current = $current->getChild($char);
        }

        return $current->isEndOfWord;
    }

    public function traverse() : void
    {
        $this->_traverse($this->node);
    }

    public function remove(string $word) : void
    {
        $this->_remove($this->node, $word, 0);
    }

    private function _traverse(Node $node) : void
    {
        foreach ($node->getChildren() as $child) {
            $this->_traverse($child);
        }
    }

    private function _remove(?Node $node, string $word, int $index) : void
    {
        if ($index === strlen($word)) {
            $node->isEndOfWord = false;

            return;
        }

        $char = substr($word, $index, 1);

        $child = $node->getChild($char);

        if (! $child) {
            return;
        }

        $this->_remove($child, $word, $index + 1);

        if ($child->hasChildren() && ! $node->isEndOfWord) {
            $child->deleteChild($char);
        }
    }

    public function findWords(string $word)
    {
        $lastNode = $this->findLastNodeOf($word);

        $list = [];
        $this->_findWords($lastNode, $word, $list);

        return $list;
    }

    private function _findWords(?Node $node, string $word, array &$list) : void
    {
        if (! $node) {
            return;
        }

        if ($node->isEndOfWord) {
            $list[] = $word;
        }

        foreach ($node->getChildren() as $child) {
            $this->_findWords($child, $word.$child->char, $list);
        }
    }

    private function findLastNodeOf(string $word) : ?Node
    {
        $current = $this->node;
        foreach (str_split($word) as $char) {
            if (! $current->hasChild($char)) {
                return null;
            }

            $current = $current->getChild($char);
        }

        return $current;
    }
}
