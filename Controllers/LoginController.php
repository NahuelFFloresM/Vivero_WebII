<?php
require_once "./Models/LoginModel.php";
require_once "./Models/ProductoModel.php";
require_once "./Views/LoginView.php";

class LoginController {

    private $model;
    private $view;

	function __construct(){        
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    public function getLogin(){
        if (!isset($_SESSION)){
            $this->view->DisplayLogin();
        }
        
    }

    public function getAdmin(){
        $producto = new ProductoModel();
        $productos = $producto->getProductos();
        $this->view->DisplayAdmin($productos);
    }

    public function verifyUser(){
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];        

        $user = $this->model->getUserByMail($useremail);
        if (!empty($user) && password_verify($password,$user->contraseña_usuario)){
            session_start();
            $_SESSION['user_id'] = $user->id_usuario;
            $_SESSION['username'] = $user->nombre_usuario;
            // Chequear si la session esta iniciada con isset($_SESSION)
            if($user->permisos == 0){
                header("Location: ".URL_CONTACTO);
                exit;
            } else{
                header("Location: ".URL_ADMIN);
                exit;
            }
        } else{
            $this->view->showLoginError('Login Incorrecto');
        }
    }
}


?>