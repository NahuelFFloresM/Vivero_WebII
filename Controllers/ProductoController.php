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

    public function getProductos(){
        $productos = $this->model->getProductos();
        $this->view->mostrarProductos($productos);
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