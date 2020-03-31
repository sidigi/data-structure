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

    public function firstUnrepeatedChar(string $str)
    {
        return (new CharFinder($str))->findFirstUnrepeatingChar();
    }

    public function firstRepeatedChar(string $str)
    {
        return (new CharFinder($str))->findFirstRepeatingChar();
    }
}
