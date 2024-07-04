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
        $className = '\\ExistingCommands\\';

        if (count($this->argv) === 1) {
            $this->className = __NAMESPACE__ . ucfirst($this->argv[0]) . '\\' . $this->argv[0];
            return;
        }

        $counter = 1;
        do {
            $className .= ucfirst($this->argv[$counter-1]) . '\\';
            $counter++;
        } while ($counter !== count($this->argv));

        if ($counter >= 3) {
            $this->objectArgs = array_slice($this->argv, 2);
            $this->className = substr_replace(__NAMESPACE__ . $className, '', -1);
        }else {
            $this->className = __NAMESPACE__ . ucfirst($this->argv[$counter-1]);
        }
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