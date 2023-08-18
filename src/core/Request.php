<?php

namespace App\src\core;


class Request
{

    /**
     * @var mixed
     */
    private $request_uri;

    public function __construct()
    {
        $this->request_uri = $_SERVER['REQUEST_URI'];
    }

}