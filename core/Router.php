<?php
namespace app\core;
include __DIR__ . "/../layouts/render.php";
use app\core\Request;
class Router{
    public Request $request;
    public array $routes = [];
    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback){
        $path = strtolower($path);
        $this->routes['get'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->requestPath();
        $method = "get";
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            http_response_code(404);
            return renderView("_404");
        }

        return renderView($callback);
    }
}