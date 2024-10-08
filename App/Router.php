<?php

class Router {

    private $controller;
    private $method;


    private function __construct(){
        $this->matchRoute();
    }
    

    public function matchRoute(){
        //Aquesta funció ha de carregar el controller
        //que li passem per la url
        //Ha de carregar al metode corresponent de la classe del
        //Contorller
        //Farem servir la variable superglobal $_SESSION['REQUEST_URI']
    }

    public function run (){
        //Aquesta funció crida al controller i el seu emtode
    }
        
    



}