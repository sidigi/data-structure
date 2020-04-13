<?php

namespace App\Heap;

class MaxHeap
{
    public static function heapify(array &$items) : void
    {
        $lastParentIndex = count($items) / 2 - 1;

        for ($i = $lastParentIndex; $i >= 0; $i--) {
            self::_heapify($items, $i);
        }
    }

    public static function getKthLargest(array &$items, int $k) : int
    {
        $heap = new Heap;
        foreach ($items as $item) {
            $heap->insert($item);
        }

        for ($i = 0; $i < $k - 1; $i++) {
            $max = $heap->remove();
        }

        return $heap->max();
    }

    private static function _heapify(array &$items, int $index) : void
    {
        $largerIndex = $index;

        $leftIndex = $index * 2 + 1;
        $rightIndex = $index * 2 + 2;

        if ($largerIndex < count($items) && isset($items[$leftIndex]) && $items[$leftIndex] > $items[$largerIndex]) {
            $largerIndex = $leftIndex;
        }

        if ($largerIndex < count($items) && isset($items[$rightIndex]) && $items[$rightIndex] > $items[$largerIndex]) {
            $largerIndex = $rightIndex;
        }

        if ($largerIndex === $index) {
            return;
        }

        self::swap($items, $index, $largerIndex);
        self::_heapify($items, $largerIndex);
    }

    private static function swap(array &$items, int $first, int $second) : void
    {
        $tmp = $items[$first];
        $items[$first] = $items[$second];
        $items[$second] = $tmp;
    }
}
