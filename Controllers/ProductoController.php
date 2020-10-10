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