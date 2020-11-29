<?php
require_once("./Models/UserModel.php");
require_once("./Models/CategoriaModel.php");
require_once("./Views/UserView.php");

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

    public function getUsuarios(){
        if ($this->verifySession()){
            $categoriaM = new CategoriaModel();
            $usuarios = $this->model->getUsers();
            $categorias = $categoriaM->getCategorias();
            $this->view->DisplayAdmin($categorias,$usuarios);
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

    public function editUsuario($params){
        $id = $params[':id'];
        if ($this->isAdmin() && $id){
            $categoriaM = new CategoriaModel();
            $categorias = $categoriaM->getCategorias();
            $user = $this->model->getUserById($id);
            $this->view->DisplayEditUser($categorias,$user);
        } else {
            header("Location: ".URL_CONTACTO);
            exit;
        }
    }

    public function editUserById($params = null){
        //$decoded = json_decode(file_get_contents("php://input"));
        if ($this->isAdmin()){
            $name = $_POST['nombre_user'];
            $email = $_POST['email_user'];
            $permiso = $_POST['permiso'];
            $id = $params[':id'];
            $result = $this->model->editUserById($name,$email,$permiso,$id);
            header("Location: ".URL_ADMIN."/usuarios");
            exit;
        }
    }

    public function deleteUser($params = null){
        if ($this->isAdmin()){
            $id = $params[':id'];
            $result = $this->model->deleteUser($id);
            header("Location: ".URL_ADMIN."/usuarios");
            exit;
        }
    }
}


?>