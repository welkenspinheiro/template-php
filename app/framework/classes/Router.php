<?php

namespace app\framework\classes;

use Exception;
use app\framework\classes\Auth;

class Router
{
    private string $path;

    private string $request;

    private function routeFound($routes)
    {
        if(!isset($routes[$this->request])){
            throw new Exception("Route {$this->path} nao existe");
        }

        if(!isset($routes[$this->request][$this->path])){
            throw new Exception("Route {$this->path} nao existe");
        }
    }

    private function controllerFound(string $controllerNamespace,string $controller,string $action)
    {
        if(!class_exists($controllerNamespace)){
            throw new Exception("O controle {$controller} nao existe");
        }
        if(!method_exists($controllerNamespace, $action)){
            throw new Exception("O metodo {$action} nao existe no controle {$controller}");
        }
    }

    public function execute($routes)
    {
        $this->path = path();
        $this->request = request();

        $this->routeFound($routes);
        list($controller, $action) = explode('@',$routes[$this->request][$this->path]);

        if(str_contains($action,':')){
            [$action, $auth] = explode(':',$action);
            Auth::check($auth);
        }

        $controllerNamespace = "app\\controllers\\{$controller}";
        $this->controllerFound($controllerNamespace,$controller,$action);

        $controllerInstance = new $controllerNamespace;
        $controllerInstance->$action();
    }
}