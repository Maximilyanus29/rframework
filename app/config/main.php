<?php

return [
    "currentDatetime" => new DateTime(),
    "db" => [
        "driver" => "postgres",
        "host" => "db",
        "db" => "postgres",
        "user" => "postgres",
        "password" => "postgres",
    ],
    "routes" => [
        "/" => [MainController::class, "index"],
        "/all" => [MainController::class, "index"],
        "/usa" => [MainController::class, "usa"],
    ],
];