<?php
require_once("Router.php");
require_once("./Controllers/HomeController.php");
require_once("./Controllers/ProductoController.php");
require_once("./Controllers/InfoController.php");
require_once("./Controllers/LoginController.php");
require_once("./Controllers/ContactoController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_CONTACTO", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/contacto');
define("URL_ADMIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/admin');

// recurso solicitado
$resource = $_GET["action"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("home","GET","HomeController","getHome");
$router->addRoute("login","GET","LoginController","getLogin");
$router->addRoute("admin","GET","LoginController","getAdmin");
$router->addRoute("loguser","POST","LoginController","verifyUser");
$router->addRoute("productos","GET","ProductoController","getProductos");
$router->addRoute("info","GET","InfoController","getInfo");
$router->addRoute("contacto","GET","ContactoController","getContacto");
$router->addRoute("producto/:id","GET","ProductoController","getProductoById");
$router->addRoute("productos/detalle/:id","GET","ProductoController","mostrarDetalle");
$router->addRoute("editProducto/:id","GET","ProductoController","getProductoById");
$router->addRoute("editProducto/:id","POST","ProductoController","editProducto");


$router-> setDefaultRoute("HomeController", "getHome");

// rutea
$router->route($resource, $method);
