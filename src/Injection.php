<?php

namespace src;
class Injection
{
    private array $classNames;
    private array $objects = [];

    public function __construct(array $classNames)
    {
        $this->classNames = $classNames;
    }

    public function prepareObjects(): void {
        foreach ($this->classNames as $className) {
            $this->objects[] = Container::{$className}();
        }
    }

    public function getObjects(): array {
        return $this->objects;
    }
}