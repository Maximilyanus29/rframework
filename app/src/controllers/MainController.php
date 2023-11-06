<?php

class MainController
{
    /**
     * @return Response
     */
    public function index()
    {
        $models = DB::get("select * from city");


        return (new Response())->send(200, true, $models);
    }
}