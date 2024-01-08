<?php

namespace Application\Utilities;

class FrontController {
    private $basePath;
    private $uri;
    private $method;
    private $controller;
    private $action;
    private $params;

    public function __construct($basePath) {
        $this->c = $c;
        $this->basePath = $basePath;
    }

    public function handleRequest() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        $uri = $_SERVER['REQUEST_URI'];
        $uri = rtrim($uri, '/');
        $uri = filter_var($uri, FILTER_SANITIZE_URL);
        $uri = str_replace($this->basePath, '', $uri);
        $uriSegments = explode('/', $uri);

        $controllerName = isset($uriSegments[0]) && !empty($uriSegments[0]) ? ucfirst($uriSegments[0]) . 'Controller' : 'HomeController';
        $action = isset($uriSegments[1]) && !empty($uriSegments[1]) ? $uriSegments[1] : 'index';
        $params = array_slice($uriSegments, 2);

        $controllerFile = __DIR__ . "/../controllers/$controllerName.php";

        if (file_exists($controllerFile)) {
            //require_once($controllerFile);
            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $action)) {
                    call_user_func_array([$controller, $action], $params);
                } else {
                    echo "Action '$action' not found in '$controllerName'";
                }
            } else {
                echo "Controller '$controllerName' not found";
            }
        } else {
            echo "Controller file '$controllerFile' not found";
        }
    }
}

?>