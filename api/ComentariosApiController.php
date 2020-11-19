<?php
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");
require_once("./Models/ComentarioModel.php");

class ComentariosApiController extends ApiController{

    private $model;
  
    public function __construct() {
        // PREGUNTAR !!!!
        parent::__construct();
        //
        $this->model = new ComentarioModel();
        session_start();
    }

    private function verifySession(){
        return true;
    }

    private function isAdmin(){
        // Lo mejor seria consultar a la DB por el permiso
        if(isset($_SESSION["permisos"]) && ($_SESSION["permisos"] == 1)){
            return true;
        }
        return false;
    }

    public function getComentarios($params =null) {
        $comentarios = $this->model->getComentarios($params[0]);
        if($comentario ==true){
            return $this->response($comentario, 200);
        }
        else{
            return $this->response(null, 404);
        }
    }

    public function agregarComentario($params = null){
        $array = $this->getData();
        $respuesta = $this->model->agregarComentario($array->comentario, $array->puntuacion, $array->id_producto, $array->id_usuario);
        
        return $this->view->response($respuesta,200);
    }

    public function borrarComentario($params = null){
        if ($params != null){
            $id_comentario = $params[':ID'];
            $respuesta = $this->model->borrarComentario($id_comentario);
            $this->view->response($respuesta,200);
        } else {
            $this->view->response("El comentario no existe",404);
        }
    }

    public function getComentariosByUsers(){
        if ($this->isAdmin()){
            $comentarios = $this->model->getComentariosByUsers();
            $this->view->response($comentarios,200);
        } else {
            $this->view->response("Sesion Incorrecta",403);
        }
    }

    public function getComentarioById($params = null){
        if ($this->isAdmin()){
            $id = $params[':ID'];
            $comentario = $this->model->getComentarioById($id);
            $this->view->response($comentario,200);
        } else {
            $this->view->response("Sesion Incorrecta",403);
        }
    }

    public function editComentario(){
        if ($this->isAdmin()){
            $body = $this->getData();
            $id = $body->id_comentario;
            $nuevo_comentario = $body->comentario;
            $comentario = $this->model->editComentario($nuevo_comentario,$id);
            $this->view->response($comentario,200);
        } else {
            $this->view->response("Sesion Incorrecta",403);
        }
    }


}