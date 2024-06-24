<?php

namespace src;

class Request
{
    private static $instance = null;
    private static array $body;
    private static array $queryParams;

    private function __construct(array $body, array $queryParams){
        self::$body = $body;
        self::$queryParams = $queryParams;
    }

    public static function getInstance(array $body = [], array $queryParams = []): self
    {
        if (null === self::$instance) {
            self::$instance = new self($body, $queryParams);
        }

        return self::$instance;
    }

    public function __get(string $name)
    {
        if (self::$$name) {
            return self::$$name;
        }

        return 'no such property';
    }
}