<?php

namespace App;

use App\src\core\Controller;
use App\src\core\Request;
use App\src\core\Route;
use App\src\core\RouteParser;
use App\src\core\Router;

class App
{
    private $config = [];
    private $container = [];
    private $route;


    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        $this->autoloadRegister();

        $routeParser = new RouteParser();
        $dd = $routeParser->parse("/api/{entity}/{id}");
        var_dump($dd);die;
        Router::handleRequest();
    }

    private function autoloadRegister()
    {
        return spl_autoload_register(function ($className) {
            // Преобразование пространства имен в путь к файлу
            $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
            $filePath = __DIR__ . "/" . str_replace('App/', '', $filePath);
            // Проверка существования файла
            if (file_exists($filePath)) {
                require_once $filePath;
            } else {
                throw new \Exception("Class $className not found");
            }
        });
    }
}