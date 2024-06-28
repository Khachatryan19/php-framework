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
        $funcName = strtolower(substr(strrchr($name, "\\"), 1));

        if (method_exists(self::class, $funcName)) {
            return self::{$funcName}();
        }

        return new $name();
    }
}