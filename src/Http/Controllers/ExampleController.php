<?php

namespace src\Http\Controllers;
use src\Request;
use src\Router;
use src\Test;

class ExampleController
{
    public function test()
    {
        echo 'example test is working';
    }

    public function test2()
    {
        echo 'example test 2 is working';
    }

    public function post(Test $test, Request $request)
    {

    }
}