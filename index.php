<?php

require_once('App/Router.php');
use App\Router;

if (!isset($_SESSION)) {
    session_start();
}

echo "Estic al índex";

$myRouter = new Router();
$myRouter->run();
