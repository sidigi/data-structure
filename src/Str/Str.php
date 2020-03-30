<?php

namespace App\Str;

class Str
{
    public function reverse(string $str)
    {
        return implode(array_reverse(str_split($str)));
    }

    public function isBalanced(string $str)
    {
        return (new Expression($str))->isBalanced();
    }
}
