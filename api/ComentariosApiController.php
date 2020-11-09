<?php
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ComentariosApiController extends ApiController{
  
    public function __construct() {
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

    public function getComentarios() {
        $comentarios = $this->model->getComentarios();
        $this->view->response($tareas, 200);
    }

    public function nuevoComentario($params = null){
        if ($params != null){
            $comentario = $_POST['comentario'];
            $user = $_POST['user_id'];
            $puntuacion = $_POST['puntuacion'];
            $respuesta = $this->model->borrarComentario($id_comentario);
            $this->view->response($respuesta,200);
        } else {
            $this->view->response([],400);
        }
    }

    public function borrarComentario($params = null){
        if ($params != null){
            $id_comentario = $params[':ID'];
            $respuesta = $this->model->borrarComentario($id_comentario);
            $this->view->response($respuesta,200);
        } else {
            $this->view->response([],400);
        }
    }


}