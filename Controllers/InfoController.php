<?php
require_once "./Models/InfoModel.php";
require_once "./Views/InfoView.php";

class InfoController {
    
    private $model;
    private $view;

    function __construct(){
        $this->view = new InfoView();
        session_start();

    }

    public function getInfo(){
        $this->view->DisplayInfo();
    }

    

}