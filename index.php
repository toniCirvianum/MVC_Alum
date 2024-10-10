<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once('App/Router.php');
require_once('App/Core/Controller.php');
require_once('App/Model/Orm.php');
require_once('App/Model/Mp.php');

use App\Router;


// spl_autoload_register(function($classe) {
//     str_replace('\\','/',$classe);
//     $classe=$classe.".php";
//     require_once($classe);
// });



$myRouter = new Router();
$myRouter->run();


