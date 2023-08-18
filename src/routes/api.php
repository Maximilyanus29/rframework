<?php

use App\src\core\Router;


// Примеры использования:
Router::get("/", "HomeController@index");
Router::get("/users/(\d+)", "UserController@show");
Router::post("/users", "UserController@store");
Router::put("/users/(\d+)", "UserController@update");
Router::delete("/users/(\d+)", "UserController@delete");