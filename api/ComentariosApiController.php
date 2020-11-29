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

    private function isAdmin(){
        $id = $_SESSION['id_user'];
        $find_user = $this->model_user->getUserById($id);
        // Agregar al AND el checqueo de PASSWORD
        if ($find_user){
            return true;
        }
        // if(isset($_SESSION["permisos"]) && ($_SESSION["permisos"] == 1)){
        //     return true;
        // }
        return false;
    }

    public function agregarComentario($params = null){
        $array = $this->getData();
        $comentario= $array->commentText;
        $puntuacion=$array->inlineRadioOptions;
        $id_producto=$array->id_producto;
            $respuesta = $this->model->agregarComentario($comentario,$puntuacion,$id_producto,1);
            if($respuesta){
                $this->view->response("Se agrego exitosamente el comentario $respuesta",200);
            }
            else{
                $this->view->response("No se pudo agregar el comentario",500);
            }
    }
    
    public function getComentarios($params =null) {
        $id_producto= $params[':ID'];
        //var_dump($id_producto);
        //die();
        $comentarios = $this->model->getComentarios($id_producto);
        if($comentarios==true){
            return $this->response($comentarios, 200);
        }
        else{
            return $this->response("No hay comentarios de este producto", 404);
        }
    }

    public function getComentariosByUsers($params = null){
        if ($this->isAdmin()){
            $comentarios = $this->model->getComentariosByUsers();
            $this->view->response($comentarios,200);
        } else {
            $this->view->response("El comentario no existe",404);
        }
    }

    public function getComentarioById($params = null){
        if ($this->isAdmin()){
            $id = $params[':ID'];
            $comentario = $this->model->getComentarioById($id);
            $this->view->response($comentario,200);
        } else {
            $this->view->response("El comentario no existe",404);
        }
    }

    public function editComentario(){
        if ($this->isAdmin()){
            $body = $this->getData();
            $id = $body->id_comentario;
            $nuevo_comentario = $body->comentario;
            $comentario = $this->model->editComentario($id,$nuevo_comentario);
            $this->view->response($comentario,200);
        } else {
            $this->view->response("El comentario no existe",404);
        }
    }

    public function borrarComentario($params =null){
        if($this->isAdmin()){
            
        }
    }


}

?>