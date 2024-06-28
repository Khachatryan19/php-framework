<?php

namespace src;

class Container
{
    private static array $bindedInstance = [];

    private static function request(): Request
    {
        $jsonInput = file_get_contents('php://input');
        $body = json_decode($jsonInput, true);
        $queryParams = $_REQUEST;

        return Request::getInstance($body, $queryParams);
    }

    public static function __callStatic($name, $arguments) {
        $funcName = strtolower(substr(strrchr($name, "\\"), 1));

        if (method_exists(self::class, $funcName)) {
            return self::{$funcName}();
        }

        if (array_key_exists($name, self::$bindedInstance)) {
            return self::$bindedInstance[$name];
        }

        return new $name();
    }

    public static function bind(string $className, callable $instance): void
    {
        self::$bindedInstance[$className] = $instance();
    }
}