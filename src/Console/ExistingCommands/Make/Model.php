<?php

namespace src\Console\ExistingCommands\Make;

use src\Console\ExistingCommands\CommandAbstract;

class Model extends CommandAbstract
{
    public function __construct(string $args)
    {
        parent::__construct($args);
    }

    public function handle(): void
    {
        $directory = 'src/Http/Model/';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $createdFile = fopen($directory . $this->args . '.php', "w");
        $fileData =
            <<<END
        <?php
        
        namespace src\Http\Model;
        
        class $this->args
        {
        
        }
        END;
        fwrite($createdFile, $fileData);
        fclose($createdFile);
    }
}