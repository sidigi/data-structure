<?php

namespace App\Str;

use App\Stack\Stack;

class Expression
{
    private string $input;

    private const SYMBOLS = [
        '()',
        '[]',
    ];

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function isBalanced()
    {
        $stack = new Stack();

        foreach (str_split($this->input) as $letter) {
            if ($this->isLeftCharEq($letter)) {
                $stack->push($letter);
            }

            if ($this->isRightCharEq($letter)) {
                if ($stack->pop() !== $this->symbols()[$letter]) {
                    return false;
                }
            }
        }

        return $stack->isEmpty();
    }

    private function isLeftCharEq(string $letter)
    {
        return in_array($letter, array_values($this->symbols()));
    }

    private function isRightCharEq(string $letter)
    {
        return in_array($letter, array_keys($this->symbols()));
    }

    private function symbols()
    {
        $symbols = [];

        foreach (self::SYMBOLS as $val) {
            $symbols[$val[1]] = $val[0];
        }

        return $symbols;
    }
}
