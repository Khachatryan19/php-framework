<?php

namespace src;

class B
{
    private $a;
    public function __construct()
    {
        $a = new A();
        $this->a = $a;
    }

    public function getDescriptionOFA()
    {
        return $this->a->getDescription();
    }
}