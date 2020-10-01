<?php
require_once("Router.php");
require_once("./Controllers/HomeController.php");

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
// $router->addRoute("tareas", "GET", "TareasApiController", "getTareas");
// $router->addRoute("tareas/:ID", "GET", "TareasApiController", "getTarea");
// $router->addRoute("tareas/:ID", "DELETE", "TareasApiController", "deleteTask");
// $router->addRoute("tareas", "POST", "TareasApiController", "addTask");
// $router->addRoute("tareas/:ID", "PUT", "TareasApiController", "updateTask");

$router-> setDefaultRoute("HomeController", "getHome");

// rutea
$router->route($resource, $method);
