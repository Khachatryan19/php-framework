<?php

use src\Http\Controllers\ExampleController;
use src\Router;

Router::add('GET', '/api/example', [new ExampleController(), 'test']);
Router::add('GET', '/api/example2', [new ExampleController(), 'test2']);

Router::dispatch();