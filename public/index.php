<?php
define("BASE_DIR", dirname(__DIR__));
define("DEBUG", true);
require_once "../App.php";


$config = [
    "db"=>[
        "user"=>"213",
        "pass"=>"213",
    ],
    "debug" => DEBUG
];

$app = new \App\App($config);

$app->run();


