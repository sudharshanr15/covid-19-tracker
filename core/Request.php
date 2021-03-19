<?php

namespace app\core;

class Request{
    public function requestPath(){
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        return $path;
    }
}