<?php

namespace App\Str;

class CharFinder
{
    private string $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function findFirstUnrepeatingChar()
    {
        $repeatedChars = [];
        foreach (str_split($this->input) as $item) {
            $repeatedChars[$item] = $repeatedChars[$item] ?? 0;
            $repeatedChars[$item] += 1;
        }

        foreach ($repeatedChars as $key => $item) {
            if ($item === 1) {
                return $key;
            }
        }
    }

    public function findFirstRepeatingChar()
    {
        $repeatedChars = [];
        foreach (str_split($this->input) as $item) {
            if (isset($repeatedChars[$item])) {
                return $item;
            }

            $repeatedChars[$item] = 0;
        }
    }
}
