<?php

namespace App;

use App\Stack\Stack;

class Str
{
    public function reverse(string $str)
    {
        return implode(array_reverse(str_split($str)));
    }

    public function isBalance(string $str)
    {
        $stack = new Stack();
        $symbols = [
            ')' => '(',
            ']' => '[',
        ];

        foreach (str_split($str) as $letter) {
            if (in_array($letter, array_values($symbols))) {
                print_r($letter);
                $stack->push($letter);
            }

            if (in_array($letter, array_keys($symbols))) {
                if ($stack->pop() !== $symbols[$letter]) {
                    return false;
                }
            }
        }

        return $stack->isEmpty();
    }
}
