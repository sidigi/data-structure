<?php

namespace App\Str;

class Utils
{
    public static function removeDuplicates(string $str)
    {
        return implode(' ', array_unique(explode(' ', trim($str))));
    }

    public static function areRotations(string $str1, string $str2) : bool
    {
        return count($str1) === count($str2) && strpos(($str1 + $str1), $str2);
    }

    public static function reverseWords(string $str)
    {
        return implode(' ', array_reverse(explode(' ', trim($str))));
    }

    public static function countVowels(string $str)
    {
        $count = 0;
        $vowels = 'aeiuo';
        foreach (str_split($str) as $char) {
            if (strpos($vowels, strtolower($char)) !== false) {
                $count++;
            }
        }

        return $count;
    }

    public static function reverse(string $str)
    {
        $strArray = str_split($str);
        $newStr = '';
        for ($i = count($strArray) - 1; $i >= 0; $i--) {
            $newStr .= $strArray[$i];
        }

        return $newStr;
    }
}
