<?php

use src\Http\Controllers\ExampleController;
use src\Router;

Router::prefix('/api', function () {
    Router::add('GET', '/example', [new ExampleController(), 'test']);
    Router::add('GET', '/example2', [new ExampleController(), 'test2']);
    Router::add('POST', '/post', [new ExampleController(), 'post']);
});

Router::dispatch();