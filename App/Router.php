<?php

namespace App;

class Router {

    private $controller;
    private $method;


    public function __construct(){
        $this->matchRoute();
    }
    

    public function matchRoute(){
        //Aquesta funció ha de carregar el controller
        //que li passem per la url
        //Ha de carregar al metode corresponent de la classe del
        //Contorller
        //Farem servir la variable superglobal $_SESSION['REQUEST_URI']
        $url_array= explode('/',$_SERVER['REQUEST_URI']);
        print_r($url_array);
        //estic assignant el nom del controller
        $this->controller = !empty($url_array[1])? $url_array[1] : 'main';
        $this->controller=$this->controller."Controller";
        $controllerPath = "App/Controllers/".$this->controller.".php";

        if(file_exists($controllerPath)) {
            require_once($controllerPath);
        } else {
            die("Error: no existeix la pagina");
        }

        if (isset($url_array[2])) {
            $this->method=!empty($url_array[2])? $url_array[2] : 'index';
        }


    }

    public function run (){
        //Aquesta funció crida al controller i el seu metode
        if (class_exists($this->controller)) {
            $controller = new $this->controller();

            if(method_exists($controller,$this->method)) {
                $method = $this->method;
                $controller->$method;
            } else {
                die("Erros: metode no existeix");
            }
        }

        
    }
        
    



}