<?php

namespace src;

class Test
{
    private string $sentence;
    public function __construct(string $sentence)
    {
        $this->sentence = $sentence;
    }

    public function getSentence(): string
    {
        return $this->sentence;
    }
}