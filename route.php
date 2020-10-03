<?php
require_once("Router.php");
require_once("./Controllers/HomeController.php");
require_once("./Controllers/ProductoController.php");
require_once("./Controllers/LoginController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["action"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("home","GET","HomeController","getHome");
$router->addRoute("productos","GET","ProductoController","getProductos");
$router->addRoute("login","GET","LoginController","getLogin");

$router-> setDefaultRoute("HomeController", "getHome");

// rutea
$router->route($resource, $method);
