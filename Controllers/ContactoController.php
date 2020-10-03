<?php
require_once "./Models/ContactoModel.php";
require_once "./Views/ContactoView.php";

class ContactoController {
    
    private $model;
    private $view;

    function __construct(){
        $this->view = new ContactoView();
    }

    public function getContacto(){
        $this->view->DisplayContacto();
    }
}