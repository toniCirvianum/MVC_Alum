<?php

namespace App;

class Router {

    private $controller;
    private $method;
    private $values=[];

    public function __construct(){
        $this->matchRoute();
    }

    public function matchRoute(){

        $rutes = array(
            '/',
            '/index',
            'default/index',
            'error/idnex',
            'mp/index',
            'mp/storeNew',
            'mp/destroy',
            'mp/update',
            'mp/storeUpdate',
            'user/index',
            'user/login',
            'user/logout'
        );
        $url_array = explode('/', $_SERVER['REQUEST_URI']); //guardem la url en un array
        $this->controller = !empty($url_array[1]) ? $url_array[1] : 'default';
        $this->controller = $this->controller . "Controller"; //gaurdem el nom del controller
        $controllerPath = "App/Controllers/" . $this->controller . ".php"; //guardem la ruta del controller
        $this->method = !empty($url[2]) ? $url_array[2] : 'index';
        $trobat=false;
        
        foreach ($rutes as $ruta) {

            if ($ruta == $url_array[1] . "/" . $this->method) {
                require_once("App/Controllers/" . $this->controller . ".php");
                $trobat = true;
                break;
            }
        }
        if (!$trobat) {
            $this->controller = 'errorController';
            $this->method = 'index';
            require_once("App/Controllers/" . $this->controller . ".php");
        }

        $items = count($url_array);

        if ($items >3) {
            for ($i=3; $i < $items; $i++) { 
                $this->values[$i-3]=$url_array[$i];
            }
        }
    }

    public function run()
    {
        $controller = new $this->controller();
        $method = $this->method;
        $controller->$method();

        isset($this->values) ? $controller->$method($this->values) : $controller->$method();
    }


}