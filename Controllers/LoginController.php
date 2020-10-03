<?php
require_once "./Models/LoginModel.php";
require_once "./Views/LoginView.php";

class LoginController {

    private $model;
    private $view;

	function __construct(){        
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    public function getLogin(){
        $this->view->DisplayLogin();
    }
}


?>