<?php
require_once "./Models/HomeModel.php";
require_once "./Views/HomeView.php";

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
}


?>