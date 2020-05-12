<?php

namespace App\Sorting;

class InsertionSort
{
    public function sort(array $items)
    {
        for ($i = 1; $i < count($items); $i++) {
            $current = $items[$i];
            $j = $i - 1;

            while ($j >= 0 && $items[$j] > $current) {
                $items[$j + 1] = $items[$j];
                $j--;
            }

            $items[$j + 1] = $current;
        }

        return $items;
    }
}
