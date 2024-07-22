<?php

namespace src\Console;

class Console
{
    private array $argv;
    private $objectArgs;
    private string $className;

    private function doModifications(array $argv): void
    {
        array_shift($argv);

        switch ($argv[0]) {
            case '--help':
                print_r('help');
                break;
            case '--version':
                print_r('version');
                break;
            case strpos(implode(' ', $argv), ':') == true:
                $colonArray = explode(':', $argv[0]);
                array_shift($argv);
                break;
        }

        $this->argv = array_merge($colonArray??[], $argv);
    }

    private function setCommandFileName(): void
    {
        $folderName = '\\ExistingCommands\\';

        if (count($this->argv) > 2) {
            $this->objectArgs = array_pop($this->argv);
        }

        $capitalLettersArray = array_map(function ($item) {
            return ucfirst($item);
        }, $this->argv);

        $this->className = __NAMESPACE__ . $folderName . implode('\\', $capitalLettersArray);
    }

    public function __construct()
    {
        $argv = $_SERVER['argv'];
        $this->doModifications($argv);
        $this->setCommandFileName();
    }

    public function getArguments(): array
    {
        return $this->argv;
    }

    public function getFileName(): string
    {
        return $this->className;
    }

    public function runCommand()
    {
        new $this->className($this->objectArgs??[]);
    }
}