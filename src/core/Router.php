<?php

namespace App\src\core;

class Router {
    private static $routes = [];

    public static function get($url, $controllerMethod) {
        self::$routes["GET"][$url] = $controllerMethod;
    }

    public static function post($url, $controllerMethod) {
        self::$routes["POST"][$url] = $controllerMethod;
    }

    public static function put($url, $controllerMethod) {
        self::$routes["PUT"][$url] = $controllerMethod;
    }

    public static function delete($url, $controllerMethod) {
        self::$routes["DELETE"][$url] = $controllerMethod;
    }

    public static function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $controllerMethod) {
                $pattern = "~^" . preg_replace('/{([^}]+)}/', '(?<$1>[^/]+)', $route) . "$~";
                if (preg_match($pattern, $url, $matches)) {
                    self::invokeControllerMethod($controllerMethod, $matches);
                }
            }
        }

        return new Response();
    }

    private static function invokeControllerMethod($controllerMethod, $params) {
        list($controller, $method) = explode("@", $controllerMethod);

        if (class_exists($controller)) {
            $controllerInstance = new $controller();

            if (method_exists($controllerInstance, $method)) {
                // Передаем именованные параметры вместо массива
                call_user_func_array([$controllerInstance, $method], $params);
            } else {
                echo "Invalid method";
            }
        } else {
            echo "Invalid controller";
        }
    }
}