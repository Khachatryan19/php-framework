<?php

use src\Container;
use src\Test;

Container::bind(Test::class, function () {
    return new Test('binding Number 1');
});
