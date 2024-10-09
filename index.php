<?php

require_once('App/Router.php');
require_once('App/Core/Controller.php');
require_once('App/Model/Orm.php');
require_once('App/Model/Mp.php');

use App\Router;

if (!isset($_SESSION)) {
    session_start();
}



$myRouter = new Router();
$myRouter->run();
