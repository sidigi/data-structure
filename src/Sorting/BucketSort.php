<?php

namespace App\Sorting;

class BucketSort
{
    public function sort(array &$items, int $numberOfBuckets = 3)
    {
        $buckets = [];

        for ($i = 0; $i < $numberOfBuckets; $i++) {
            $buckets[$i] = [];
        }

        foreach ($items as $item) {
            $index = floor($item / $numberOfBuckets);
            $buckets[$index][] = $item;
        }

        $i = 0;
        foreach ($buckets as $bucket) {
            sort($bucket);
            foreach ($bucket as $item) {
                $items[$i++] = $item;
            }
        }
    }
}
