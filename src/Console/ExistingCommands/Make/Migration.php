<?php

namespace src\Console\ExistingCommands\Make;
class Migration
{
    private array $args;
    public function __construct(array $args = [])
    {
        $this->args = $args;
        $this->handle();
    }

    public function handle() {
        print_r($this->args);
        die;
    }
}