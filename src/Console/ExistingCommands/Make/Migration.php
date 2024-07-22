<?php

namespace src\Console\ExistingCommands\Make;
use src\Console\ExistingCommands\CommandAbstract;

class Migration extends CommandAbstract
{
    public function __construct(string $args)
    {
        parent::__construct($args);
    }

    public function handle() {
        fopen('test.txt', "w");
        print_r($this->args);
        die;
    }
}