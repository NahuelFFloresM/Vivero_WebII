<?php
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");
require_once ("./Models/ComentarioModel.php");

class ComentariosApiController extends ApiController{

    private $model;
  
    public function __construct() {
        $this->model = new ComentariosModel();
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


}