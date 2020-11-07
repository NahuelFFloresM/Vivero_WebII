<?php
require_once("./Models/ProductoModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ProductosApiController extends ApiController{

    private $model;
  
    public function __construct() {
        $this->model = new ProductoModel();
        session_start();
    }

    private function verifySession(){
        return true;
    }

    private function isAdmin(){
        return false;
    }

    public function getProductos() {
        $productos = $this->model->getProductos();
        echo json_encode($productos);
    }
}