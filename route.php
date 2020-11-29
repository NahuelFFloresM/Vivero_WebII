<?php
require_once("Router.php");
require_once("./Controllers/HomeController.php");
require_once("./Controllers/ProductoController.php");
require_once("./Controllers/InfoController.php");
require_once("./Controllers/LoginController.php");
require_once("./Controllers/ContactoController.php");
require_once("./Controllers/CategoriaController.php");
require_once("./Controllers/UserController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');
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
$router->addRoute("register","GET","LoginController","getRegister");
$router->addRoute("registeruser","POST","LoginController","registrarUser");
$router->addRoute("logout","GET","LoginController","getLogout");
$router->addRoute("admin","GET","LoginController","getAdmin");
$router->addRoute("admin/categorias","GET","CategoriaController","getCategorias");
$router->addRoute("admin/productos","GET","ProductoController","getProductosAdmin");
$router->addRoute("admin/usuarios","GET","UserController","getUsuarios");
$router->addRoute("loguser","POST","LoginController","verifyUser");
$router->addRoute("productos","GET","ProductoController","getProductos");
$router->addRoute("info","GET","InfoController","getInfo");
$router->addRoute("contacto","GET","ContactoController","getContacto");
$router->addRoute("producto","POST","ProductoController","nuevoProducto");
$router->addRoute("producto/:id","GET","ProductoController","getProductoById");
$router->addRoute("producto/borrar/:id","POST","ProductoController","deleteProducto");
$router->addRoute("productos/detalle/:id","GET","ProductoController","mostrarDetalle");
$router->addRoute("productos/categoria/:id_categoria","GET","ProductoController","getProductoPorCategoria");
$router->addRoute("categoria","POST","CategoriaController","nuevaCategoria");
$router->addRoute("editCategoria/:id","GET","CategoriaController","getCategoriaById");
$router->addRoute("editCategoria/:id","POST","CategoriaController","editCategoria");
$router->addRoute("editCategoria/borrar/:id","POST","CategoriaController","deleteCategoria");
$router->addRoute("editProducto/:id","GET","ProductoController","getProductoById");
$router->addRoute("editProducto/:id","POST","ProductoController","editProducto");
$router->addRoute("editUsuario/:id","GET","UserController","editUsuario");
$router->addRoute("editUsuario/:id","POST","UserController","editUserById");
$router->addRoute("editUsuario/borrar/:id","POST","UserController","deleteUser");
$router->addRoute("buscador","POST","ProductoController","buscadorProducto");


$router-> setDefaultRoute("HomeController", "getHome");

// rutea
$router->route($resource, $method);
