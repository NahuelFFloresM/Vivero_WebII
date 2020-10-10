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
        //$this->model->editProductoById($id);
        header("Location: " . URL_Admin);
        
    }

    /* Muestra el detalle del item */
    function mostrarDetalle($id) {
        $producto = $this->model->getProductoById($id);
        if($producto) {
            $this->view->mostrarProductoById($producto);
        }
        else {
            $this->view->showError('Producto no encontrado!');
        }
    }

}


?>