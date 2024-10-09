<?php

require_once('App/Router.php');
require_once('App/Core/Controller.php');
use App\Router;

if (!isset($_SESSION)) {
    session_start();
}



$myRouter = new Router();
$myRouter->run();
