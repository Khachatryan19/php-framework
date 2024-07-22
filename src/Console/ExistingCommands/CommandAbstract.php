<?php

namespace src\Console\ExistingCommands;

abstract class CommandAbstract
{
    protected string $args;
    protected function __construct(string $args)
    {
        $this->args = $args;
        $this->handle();
    }

    protected abstract function handle();
}