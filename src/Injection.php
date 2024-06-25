<?php

namespace src;
class Injection
{
    private array $classNames = [];
    private array $objects = [];

    public function __construct(array $classNames)
    {
        $this->classNames = $classNames;
    }

    public function prepareObjects(): void {
        foreach ($this->classNames as $className) {
            $lowerMethodName = strtolower($className);
            $this->objects[] = Container::{$lowerMethodName}();
        }
    }

    public function getObjects(): array {
        return $this->objects;
    }
}