<?php

if (env('DB_CONNECTION') == 'mysql') {
    $mysqli = new mysqli(
        env('DB_HOST'),
        env('DB_USER'),
        env('DB_PASSWORD'),
        env("DB_NAME"),
        env("DB_PORT")
    );
    print_r($mysqli);
    die();

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
}