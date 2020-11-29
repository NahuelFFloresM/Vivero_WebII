<?php
require_once "./Models/ProductoModel.php";
require_once "./Views/ProductoView.php";
require_once "./Models/CategoriaModel.php";

class ProductoController {

    private $model;
    private $view;
    private $sesion;

	function __construct(){        
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
        session_start();
        $this->verifySession();
    }

    function verifySession(){
        if(isset($_SESSION["user_id"])){
            return true;
        }
        return false;
    }

    private function isAdmin(){
        if(isset($_SESSION["permisos"]) && ($_SESSION["permisos"] == 1)){
            return true;
        }
        return false;
    }

    //  mueve la imagen y retorna la ubicación}
    private function moveFile($imagen) {
        $filepath = "images/" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen['tmp_name'], $filepath);
        return $filepath;
    }

    /*Obtiene todos los productos y hace el display*/
    public function getProductos(){
        $productos = $this->model->getProductos();
        $categoriaM = new CategoriaModel();
        $categorias = $categoriaM->getCategorias();
        $this->view->mostrarProductos($productos,$categorias);
    }

    public function getProductosAdmin(){
        $productos = $this->model->getProductos();
        $categoriaM = new CategoriaModel();
        $categorias = $categoriaM->getCategorias();
        $this->view->DisplayAdmin($productos,$categorias);
    }

    /* Obtiene un producto por id y lo devuelve */
    public function getProductoById($params = null){
        if ($this->verifySession()){
            $id = $params[':id'];
            $producto = $this->model->getProductoById($id);
            $categoriaM = new CategoriaModel();
            $categorias = $categoriaM->getCategorias();
            $this->view->mostrarEditProducto($producto,$categorias);
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function nuevoProducto(){
        if ($this->verifySession()){
            $nombre = $_POST['product_name'];
            $precio = $_POST['product_price'];
            $stock = $_POST['product_stock'];
            $description = $_POST['product_description'];
            $idcat = $_POST['id_categoria'];
            if ($_FILES['image_url']['name']) {
                if ($_FILES['image_url']['type'] == "image/jpeg" || $_FILES['image_url']['type'] == "image/jpg" || $_FILES['image_url']['type'] == "image/png") {
                    $filepath = $this->moveFile($_FILES['image_url']);
                    $status = $this->model->nuevoProducto($nombre,$precio,$stock,$description,$idcat,$filepath);
                } else {
                    $this->view->showError("Formato no aceptado");
                }
            }
            else {
                $status = $this->model->nuevoProducto($nombre,$precio,$stock,$description,$idcat);
            }
            header("Location: ".URL_ADMIN);
            die;
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function editProducto($params = null){
        if ($this->isAdmin()){
            $id = $params[':id'];
            $nombre = $_POST['product_name'];
            $precio = $_POST['product_price'];
            $stock = $_POST['product_stock'];
            $description = $_POST['product_description'];
            $idcat = $_POST['id_categoria'];
            $filepath_actual = $this->model->getImagenProductoPath($id);
            if ($_FILES['image_url']['name']) {
                if ($_FILES['image_url']['type'] == "image/jpeg" || $_FILES['image_url']['type'] == "image/jpg" || $_FILES['image_url']['type'] == "image/png") {
                    $filepath = $this->moveFile($_FILES['image_url']);
                } else {
                    $this->view->showError("Formato no aceptado");
                }
            }
            if ($filepath){
                $this->model->editProducto($nombre,$precio,$stock,$description,$idcat,$filepath,$id);
                $response = $this->model->borrarImagen($filepath_actual['imagen_url']);
            } else {
                $this->model->editProducto($nombre,$precio,$stock,$description,$idcat,$filepath_actual,$id);
            }
            header("Location: ".URL_ADMIN);
            die;
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    private function borrarImagen($filepath){
        return unlink($filepath);
    }

    public function deleteProducto($params = null){
        if ($this->isAdmin()){
            $id = $params[':id'];
            if($params != null){        
                $result = $this->model->deleteProducto($id);
                // BORRAR IMAGEN DEL PRODUCTO
                header("Location: ".URL_ADMIN);
                die;
            } else {
                // armar error y mostrarlo
                header("Location: ".URL_ADMIN);
                die;
            }
        } else{
            header("Location: ".URL_HOME);
            die;
        }

    }
    
    public function getProductoPorCategoria($params = null){
        $id = $params[':id_categoria'];
        $productos = $this->model->getProductosPorCate($id);
        $categoriaM = new CategoriaModel();
        $categorias = $categoriaM->getCategorias();
        $this->view->mostrarProductos($productos,$categorias);
    }

    function mostrarDetalle($params=null) {
        $id = $params[':id'];
        $producto = $this->model->getProductoById($id);
        if($producto) {
            $this->view->mostrarDetalle($producto);
        }
        else {
            $this->view->showError('Producto no encontrado!');
        }
    }

    function buscadorProducto(){
        $categoria = $_POST['id_categoria'];
        $nombre = $_POST['nombre_producto'];
        $precio = $_POST['precio_producto'];
        $productos = $this->model->buscarProductos($categoria,$nombre,$precio);
        $categoriaM = new CategoriaModel();
        $categorias = $categoriaM->getCategorias();
        $this->view->mostrarProductos($productos,$categorias);
    }
}


?>