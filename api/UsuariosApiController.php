<?php
require_once("./Models/UserModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class UsuariosApiController extends ApiController{

    private $model;
  
    public function __construct() {
        $this->model = new UserModel();
        session_start();
    }

    private function verifySession(){
        return true;
    }

    private function isAdmin(){
        if(isset($_SESSION["permisos"]) && ($_SESSION["permisos"] == 1)){
            return true;
        }
        return false;
    }


    public function getUsers(){
        if ($this->isAdmin()){
            $users = $this->model->getUsers();
            echo json_encode($users);
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function getUserById($params = null){
        if ($this->isAdmin()){
            $id = $params[':ID'];
            $users = $this->model->getUserById($id);
            echo json_encode($users);
        } else{
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function editUserById(){
        $decoded = json_decode(file_get_contents("php://input"));
        $result = $this->model->editUserById($decoded->nombre_user,$decoded->email_user,$decoded->permiso,$decoded->id_user);
        echo json_encode($result);
    }
}