<?php

require_once("./Models/ComentarioModel.php");

abstract class ApiController {
    protected $view;
    private $data;
    protected $model;
    
    public function __construct(){
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
        $this->model = new ComentarioModel();
    }

    function getData(){ 
        return json_decode($this->data); 
    }  

}
?>
