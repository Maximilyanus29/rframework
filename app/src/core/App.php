<?php

/**
 *
 */
final class App
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
        DB::init($this->config['db']);

        if (APP_DEBUG === true){
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
        }
    }

    /**
     * @return void
     */
    public function run()
    {
        try {
            $this->processRequest();
        }catch (\Exception $e){
            (new Response())->sendError(200, $e->getMessage());
        }
        exit(0);
    }

    /**
     * @return mixed
     * @throws Exception
     */
    private function processRequest()
    {
        foreach ($this->config['routes'] as $pattern => $route){
            $request = trim($_SERVER['REQUEST_URI']);
            if ($pattern === $request){
                if (class_exists($route[0])){
                    $controller = new $route[0];
                    $controller->setRequest(new Request());

                    if (method_exists($controller, $route[1])){
                        return $controller->{$route[1]}();
                    }else{
                        throw new Exception("нет такого экшена у контроллера");
                    }
                }else{
                    throw new Exception("нет такого контроллера");
                }
            }
        }
        throw new Exception("Маршрут не найден");
    }
}