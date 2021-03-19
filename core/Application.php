<?php
namespace app\core;
require "Request.php";
require "Router.php";
use app\core\{Request, Router};
class Application{
    public Request $request;
public Router $router;

    public function __construct(){
        $this->request = new Request();
        $this->router = new Router();
    }

    public function run(){
        echo $this->router->resolve($this->request->requestPath());
    }
}