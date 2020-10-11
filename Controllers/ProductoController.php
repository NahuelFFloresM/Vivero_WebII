<?php
require_once "./Models/ProductoModel.php";
require_once "./Views/ProductoView.php";

class ProductoController {

    private $model;
    private $view;

	function __construct(){        
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
    }
    /*Obtiene todos los productos y hace el display*/
    public function getProductos(){
        $productos = $this->model->getProductos();
        $this->view->mostrarProductos($productos);
    }
    /* Obtiene un producto por id y lo devuelve */
    public function getProductoById($params = null){
        $id = $params[':id'];
        $producto = $this->model->getProductoById($id);
        $categorias = $this->model->getCategorias();
        $vista = $this->view->mostrarEditProducto($producto,$categorias);
    }

    public function editProducto($params = null){
        $id = $params[':id'];
        if($params != null){        
            $this->model->editProducto($id);
            header("Location: ".URL_ADMIN);
        } else {
            // armar eerror y mostrarlo
            header("Location: ".URL_ADMIN);
        }
    }

    public function deleteProducto($params = null){
        $id = $params[':id'];
        if($params != null){        
            $this->model->deleteProducto($id);
            header("Location: ".URL_ADMIN);
        } else {
            // armar error y mostrarlo
            header("Location: ".URL_ADMIN);
        }
    }

    function mostrarDetalle($params=null) {
        $id = $params[':id'];
        $producto = $this->model->mostrarDetalle($id);
        if($producto) {
            $this->view->mostrarDetalle($producto);
        }
        else {
            $this->view->showError('Producto no encontrado!');
        }
    }

   
}


?>