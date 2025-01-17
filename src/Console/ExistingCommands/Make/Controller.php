<?php

namespace src\Console\ExistingCommands\Make;
use src\Console\ExistingCommands\CommandAbstract;

class Controller extends CommandAbstract
{
    public function __construct(string $args)
    {
        parent::__construct($args);
    }

    public function handle(): void
    {
        $directory = 'src/Http/Controllers/';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $createdFile = fopen($directory . $this->args . '.php', "w");
        $fileData =
        <<<END
        <?php
        
        namespace src\Http\Controllers;
        
        class $this->args
        {
        
        }
        END;
        fwrite($createdFile, $fileData);
        fclose($createdFile);
    }
}