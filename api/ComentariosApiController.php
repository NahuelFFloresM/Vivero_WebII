<?php
require_once("./api/ApiController.php");
require_once("./Models/UserModel.php");
require_once("./api/JSONView.php");

class ComentariosApiController extends ApiController{

    private $model_user;
  
    public function __construct() {
        parent::__construct();
        $this->model_user = new UserModel();
        session_start();
    }

    private function verifySession(){
        return true;
    }

    private function isAdmin($email,$password){
        $find_user = $this->model_user->getUserByEmail($email);
        if ($find_user && (password_verify($password,$find_user->contrasenia_usuario)) && ($find_user->permisos == 1)){
            return true;
        }
        return false;
    }

    public function agregarComentario($params = null){
        $array = $this->getData();
        $comentario= $array->commentText;
        $puntuacion=$array->inlineRadioOptions;
        $id_producto=$array->id_producto;
        $id_usuario = ($_SESSION["user_id"]);
            $respuesta = $this->model->agregarComentario($comentario,$puntuacion,$id_producto,$id_usuario);
            if($respuesta){
                $this->view->response("Se agrego exitosamente el comentario $respuesta",200);
            }
            else{
                $this->view->response("No se pudo agregar el comentario",500);
            }
    }
    
    public function getComentarios($params =null) {
        $id_producto= $params[':ID'];
        $comentarios = $this->model->getComentarios($id_producto);
        if($comentarios){
            return $this->view->response($comentarios, 200);
        }
        else{
            return $this->view->response("No hay comentarios de este producto", 404);
        }
    }

    public function borrarComentario($params =null){
        $body = $this->getData();
        if($this->isAdmin($body->user_email,$body->password)){
            $id = $params[':ID'];
            $response = $this->model->borrarComentario($id);
            $this->view->response("Borrado Exitosamente",200);
        } else{
            $this->view->response("Sin permisos",500);
        }
    }

}

?>