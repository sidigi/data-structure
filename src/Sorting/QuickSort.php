<?php

namespace App\Sorting;

class QuickSort
{
    public function sort(array &$items)
    {
        $this->_sort($items, 0, count($items) - 1);
    }

    private function _sort(array &$items, int $start, int $end)
    {
        if ($start >= $end) {
            return;
        }

        $boundary = $this->partitioning($items, $start, $end);
        $this->_sort($items, $start, $boundary - 1);
        $this->_sort($items, $boundary + 1, $end);
    }

    private function partitioning(array &$items, int $start, int $end)
    {
        $pivot = $items[$end];
        $boundary = $start - 1;

        for ($i = $start; $i <= $end; $i++) {
            if ($items[$i] <= $pivot) {
                $this->swap(++$boundary, $i, $items);
            }
        }

        return $boundary;
    }

    private function swap(int $index1, int $index2, array &$items)
    {
        $tmp = $items[$index1];
        $items[$index1] = $items[$index2];
        $items[$index2] = $tmp;
    }
}
