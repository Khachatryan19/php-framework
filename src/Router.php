<?php

namespace src;

class Router
{
    private static $routes = [];

    public static function add($method, $path, $handler)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public static function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                call_user_func($route['handler']);
                return;
            }
        }

        header("HTTP/1.1 404 Not Found");
        echo json_encode(["message" => "Endpoint not found"]);
    }
}