<?php
require_once "./Models/ProductoModel.php";
require_once "./Views/ProductoView.php";

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

    /*Obtiene todos los productos y hace el display*/
    public function getProductos(){
        $productos = $this->model->getProductos();
        $categorias = $this->model->getCategorias();
        $this->view->mostrarProductos($productos,$categorias);
    }

    /* Obtiene un producto por id y lo devuelve */
    public function getProductoById($params = null){
        if ($this->verifySession()){
            $id = $params[':id'];
            $producto = $this->model->getProductoById($id);
            $categorias = $this->model->getCategorias();
            $vista = $this->view->mostrarEditProducto($producto,$categorias);
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function nuevoProducto(){
        if ($this->vverifySession()){
            $status = $this->model->nuevoProducto();
            header("Location: ".URL_ADMIN);
            die;
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function editProducto($params = null){
        if ($this->vverifySession()){
            $id = $params[':id'];
            if($params != null){        
                $this->model->editProducto($id);
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

    public function deleteProducto($params = null){
        if ($this->vverifySession()){
            $id = $params[':id'];
            if($params != null){        
                $result = $this->model->deleteProducto($id);
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
        $categorias = $this->model->getCategorias();
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

   
}


?>