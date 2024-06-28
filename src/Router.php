<?php

namespace src;

use ReflectionMethod;
use src\Http\Controllers\ExampleController;

class Router
{
    private static $routes = [];
    private static $body = [];
    private static $prefix = '';

    public static function add($method, $path, $handler)
    {
        $jsonInput = file_get_contents('php://input');
        self::$body = json_decode($jsonInput, true);

        self::$routes[] = [
            'body' => self::$body,
            'method' => $method,
            'path' => self::$prefix . $path,
            'handler' => $handler,
            'query' => $_REQUEST,
        ];
    }

    public static function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                $rm = new ReflectionMethod($route['handler'][0], $route['handler'][1]);

                $classNames = [];
                foreach ($rm->getParameters() as $parameter) {
                    $classNames[] = $parameter->getType()->getName();
                }

                $injection = new Injection($classNames);
                $injection->prepareObjects();

                return call_user_func_array($route['handler'], $injection->getObjects());
            }
        }

        header("HTTP/1.1 404 Not Found");
        echo json_encode(["message" => "Endpoint not found"]);
    }

    public static function prefix($prefix, callable $routes)
    {
        self::$prefix = $prefix;

        call_user_func($routes);
    }

    public function print1()
    {
        return 1;
    }
}