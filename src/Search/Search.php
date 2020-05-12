<?php

namespace App\Search;

class Search
{
    public function exponential(array $items, int $target)
    {
        $cnt = count($items);
        $bound = 1;

        while ($bound < $cnt && $items[$bound] < $target) {
            $bound *= 2;
        }

        return $this->_binary(
            floor($bound / 2),
            min($bound, $cnt - 1),
            $items, $target);
    }

    public function jump(array $items, int $target)
    {
        $cnt = count($items);
        $blockSize = (int) sqrt($cnt);
        $start = 0;
        $next = $blockSize;

        while ($start < $cnt && $items[$next - 1] < $target) {
            $start = $next;
            $next += $blockSize;

            if ($next > $cnt) {
                $next = $cnt;
            }
        }

        for ($i = $start; $i <= $next; $i++) {
            if ($items[$i] === $target) {
                return $i;
            }
        }

        return -1;
    }

    public function linear(array $items, int $target)
    {
        foreach ($items as $key => $item) {
            if ($target === $item) {
                return $key;
            }
        }

        return -1;
    }

    public function ternary(array $items, int $target)
    {
        sort($items);

        return $this->_ternary(0, count($items) - 1, $items, $target);
    }

    private function _ternary(int $left, int $right, $items, $target)
    {
        if ($left > $right) {
            return  -1;
        }

        $partitionSize = floor(($right - $left) / 3);
        $mid1 = $left + $partitionSize;
        $mid2 = $right - $partitionSize;

        if ($items[$mid1] === $target) {
            return $mid1;
        }

        if ($items[$mid2] === $target) {
            return $mid2;
        }

        if ($target < $items[$mid1]) {
            return $this->_ternary($left, $mid1 - 1, $items, $target);
        }

        if ($target > $items[$mid2]) {
            return $this->_ternary($mid2 + 2, $right, $items, $target);
        }

        return $this->_ternary($mid1 + 1, $mid2 - 1, $items, $target);
    }

    public function binary(array $items, int $target)
    {
        sort($items);

        return $this->_binary(0, count($items) - 1, $items, $target);
    }

    public function binaryIterate(array $items, int $target)
    {
        sort($items);

        $left = 0;
        $right = count($items) - 1;

        while ($left <= $right) {
            $middle = floor($left + $right / 2);

            if ($items[$middle] === $target) {
                return $middle;
            }

            if ($target > $items[$middle]) {
                $left = $middle;
            } else {
                $right = $middle;
            }
        }

        return -1;
    }

    private function _binary(int $left, int $right, $items, $target)
    {
        if ($right < $left) {
            return  -1;
        }

        $middle = floor($left + $right / 2);

        if ($items[$middle] === $target) {
            return $middle;
        }

        if ($target > $items[$middle]) {
            return $this->_binary($middle + 1, $right, $items, $target);
        }

        return $this->_binary($left, $middle - 1, $items, $target);
    }
}
