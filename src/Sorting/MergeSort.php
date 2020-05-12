<?php

namespace App\Sorting;

class MergeSort
{
    public function sort(array &$items)
    {
        if (count($items) < 2) {
            return;
        }

        $middle = floor(count($items) / 2);
        $left = [];
        for ($i = 0; $i < $middle; $i++) {
            $left[] = $items[$i];
        }

        $right = [];
        for ($i = $middle; $i < count($items); $i++) {
            $right[] = $items[$i];
        }

        $this->sort($left);
        $this->sort($right);

        $this->merge($left, $right, $items);

        return $items;
    }

    private function merge(array $left, array $right, array &$result)
    {
        $i = $j = $k = 0;

        while ($i < count($left) && $j < count($right)) {
            if ($left[$i] <= $right[$j]) {
                $result[$k++] = $left[$i++];
            } else {
                $result[$k++] = $right[$j++];
            }
        }

        while ($i < count($left)) {
            $result[$k++] = $left[$i++];
        }

        while ($j < count($right)) {
            $result[$k++] = $right[$j++];
        }
    }
}
