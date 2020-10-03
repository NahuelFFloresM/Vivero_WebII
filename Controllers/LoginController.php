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

    public function verifyUser(){
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];

        $user = $this->model->getUserByMail($useremail);

        if (!empty($user) && password_verify($password,$user->password)){
            session_start();
            $_SESSION['id_user'] = $user->id;
            $_SESSION['username'] = $user->username;

            header('Location: home');
        } else{
            $this->view->showLoginError('Login Incorrecto');
        }
    }
}


?>