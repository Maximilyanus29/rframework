<?php

class MainController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {
        $models = DB::get("select * from city");

        return (new Response())->send(200, true, $models);
    }

    /**
     * @return Response
     */
    public function usa()
    {
        $bodyParams = $this->getRequest()->getBody();

        if (!isset($bodyParams['country'])){
            throw new Exception("Необходимо передать 'country'");
        }

        $models = DB::get("select * from city where country_iso3 = :country", [":country" => $bodyParams['country']]);

        return (new Response())->send(200, true, $models);
    }
}