<?php

require_once('App/Router.php');
use App\Router;

if (!isset($_SESSION)) {
    session_start();
}



$myRouter = new Router();
$myRouter->run();
