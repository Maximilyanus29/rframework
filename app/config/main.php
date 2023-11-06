<?php

return [
    "currentDatetime" => new DateTime(),
    "responseFormat" => 'json',
    "db" => [
        "driver" => "postgres",
        "host" => "db",
        "db" => "postgres",
        "user" => "postgres",
        "password" => "postgres",
    ],
    "routes" => [
        "/" => [MainController::class, "index"],
    ],
];