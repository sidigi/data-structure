<?php

namespace App\Graph;

class Node
{
    private ?string $label;

    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public function label()
    {
        return $this->label;
    }
}
