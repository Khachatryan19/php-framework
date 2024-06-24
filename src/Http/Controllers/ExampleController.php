<?php

namespace src\Http\Controllers;
use src\Request;

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

    public function post(Request $request)
    {
        $request = Request::getInstance();
        print_r($request->body);
        die;

    }
}