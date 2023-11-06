<?php
define("APP_DIR", dirname(__DIR__));
define("APP_DEBUG", true);

require_once APP_DIR . "/src/core/autoloader.php";

$config = require(APP_DIR . "/config/main.php");
$app = new App( $config );
$app->run();