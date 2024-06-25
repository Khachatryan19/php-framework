<?php

namespace src;
use src\Request;

class Container
{
    private static function request() {
        $jsonInput = file_get_contents('php://input');
        $body = json_decode($jsonInput, true);
        $queryParams = $_REQUEST;

        return Request::getInstance($body, $queryParams);
    }

    public static function __callStatic($name, $arguments)
    {
        if (method_exists(self::class, $name)) {
            return self::{$name}();
        }
    }
}