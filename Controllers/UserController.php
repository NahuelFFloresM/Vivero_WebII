<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";

class UserController {

    private $model;
    private $view;

	function __construct(){        
        $this->model = new UserModel();
        $this->view = new UserView();
        session_start();
    }

    private function verifySession(){
        if(!isset($_SESSION["user_id"])){
            return false;
        }
        return true;
    }

    public function getLogin(){
        if (!$this->verifySession()){
            $this->view->DisplayLogin();
        } else{
            header("Location: ".URL_HOME);
            exit;
        }
    }

    private function isAdmin(){
        if(isset($_SESSION["permisos"]) && ($_SESSION["permisos"] == 1)){
            return true;
        }
        return false;
    }

    public function getRegister(){
        if (!$this->verifySession()){
            $this->view->DisplayRegister();
        } else{
            header("Location: ".URL_HOME);
            exit;
        }
    }

    public function getLogout(){
        session_destroy();
        header("Location: ".URL_HOME);
        exit;
    }

    public function registrarUser(){
        if (!$this->verifySession()){
            $nombre = $_POST['username'];
            $email = $_POST['useremail'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $response = $this->model->registrarUser($nombre,$email,$password);
            $this->verifyUser();
        } else {
            header("Location: ".URL_HOME);
            exit;
        }
    }

    public function getAdmin(){
        if ($this->verifySession()){
            $productoM = new ProductoModel();
            $productos = $productoM->getProductos();
            $categorias = $productoM->getCategorias();
            $this->view->DisplayAdmin($productos,$categorias);
        } else {
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function verifyUser(){
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];
        $user = $this->model->getUserByMail($useremail);
        if (!empty($user) && password_verify($password,$user->contrasenia_usuario)){
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
        } else {
            $this->view->showLoginError('Login Incorrecto');
        }
    }
}


?>