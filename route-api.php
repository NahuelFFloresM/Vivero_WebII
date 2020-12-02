<?php
require_once("Router.php");
require_once("./api/ComentariosApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("comentario", "POST", "ComentariosApiController", "agregarComentario");
$router->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "getComentarios");
$router->addRoute("comentario/:ID", "DELETE", "ComentariosApiController", "borrarComentario");



// rutea
$router->route($resource, $method);

