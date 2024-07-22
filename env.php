<?php

function env(string $key): string
{
    $env = parse_ini_file('.env');

    return $env[$key] ?? '';
}