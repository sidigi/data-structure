<?php

namespace App\Sorting;

class CountingSort
{
    public function sort(array $items)
    {
        $counting = [];

        $max = max($items);

        for ($i = 0; $i <= $max; $i++) {
            $counting[$i] = 0;
        }

        foreach ($items as $item) {
            $counting[$item]++;
        }

        $result = [];
        foreach ($counting as $key => $item) {
            for ($i = 0; $i < $item; $i++) {
                $result[] = $key;
            }
        }

        print_r($result);
    }
}
