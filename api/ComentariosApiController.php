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
    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function getTarea($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $tarea = $this->model->GetTarea($id);
        
        if ($tarea) {
            $this->view->response($tarea, 200);   
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
    }

    // TareasApiController.php
    public function deleteTask($params = []) {
        $task_id = $params[':ID'];
        $task = $this->model->GetTarea($task_id);

        if ($task) {
            $this->model->BorrarTarea($task_id);
            $this->view->response("Tarea id=$task_id eliminada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$task_id not found", 404);
    }

    // TareaApiController.php
   public function addTask($params = []) {     
        $tarea = $this->getData(); // la obtengo del body

        // inserta la tarea
        $tareaId = $this->model->InsertarTarea($tarea->titulo, $tarea->descripcion,$tarea->prioridad, 0);

        // obtengo la recien creada
        $tareaNueva = $this->model->GetTarea($tareaId);
        
        if ($tareaNueva)
            $this->view->response($tareaNueva, 200);
        else
            $this->view->response("Error al insertar tarea", 500);

    }

    // TaskApiController.php
    public function updateTask($params = []) {
        $task_id = $params[':ID'];
        $task = $this->model->GetTarea($task_id);

        if ($task) {
            $body = $this->getData();
            $titulo = $body->titulo;
            $descripcion = $body->descripcion;
            $prioridad = $body->prioridad;
            $tarea = $this->model->ActualizarTarea($task_id, $titulo, $descripcion, $prioridad);
            $this->view->response("Tarea id=$task_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$task_id not found", 404);
    }


}