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
        $categorias = $this->model->getCategorias();
        $this->view->mostrarProductos($productos,$categorias);
    }
    /* Obtiene un producto por id y lo devuelve */
    public function getProductoById($params = null){
        $id = $params[':id'];
        $producto = $this->model->getProductoById($id);
        $categorias = $this->model->getCategorias();
        $vista = $this->view->mostrarEditProducto($producto,$categorias);
    }

    public function nuevoProducto(){
        $status = $this->model->nuevoProducto();
        header("Location: ".URL_ADMIN);
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
            $result = $this->model->deleteProducto($id);
            header("Location: ".URL_ADMIN);
        } else {
            // armar error y mostrarlo
            header("Location: ".URL_ADMIN);
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