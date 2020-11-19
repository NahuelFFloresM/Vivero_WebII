<?php
require_once("Router.php");
require_once("./api/ComentariosApiController.php");
require_once("./api/CategoriasApiController.php");
require_once("./api/ProductosApiController.php");
require_once("./api/UsuariosApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("comentarios", "GET", "ComentariosApiController", "getComentariosByUsers");
$router->addRoute("comentario/:ID", "GET", "ComentariosApiController", "getComentarioById");
$router->addRoute("comentario/nuevo", "POST", "ComentariosApiController", "agregarComentario");
$router->addRoute("comentario/:ID", "PUT", "ComentariosApiController", "editComentario");
$router->addRoute("comentario/:ID", "DELETE", "ComentariosApiController", "borrarComentario");
$router->addRoute("productos/","GET","ProductosApiController","getProductos");
$router->addRoute("categorias/","GET","CategoriasApiController","getCategorias");
$router->addRoute("usuarios/","GET","UsuariosApiController","getUsers");
$router->addRoute("usuarios/:ID","GET","UsuariosApiController","getUserById");
$router->addRoute("usuarios/:ID","PUT","UsuariosApiController","editUserById");
$router->addRoute("usuarios/:ID","DELETE","UsuariosApiController","deleteUser");



// rutea
$router->route($resource, $method);

