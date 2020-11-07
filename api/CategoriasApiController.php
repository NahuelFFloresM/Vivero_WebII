<?php
require_once("./Models/CategoriaModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class CategoriasApiController extends ApiController{

    private $model;
  
    public function __construct() {
        $this->model = new CategoriaModel();
        session_start();
    }

    private function verifySession(){
        return true;
    }

    private function isAdmin(){
        return false;
    }
    
    public function getCategorias() {
        $categorias = $this->model->getCategorias();
        echo json_encode($categorias);
    }

}