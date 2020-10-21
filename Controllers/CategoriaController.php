<?php
require_once "./Models/CategoriaModel.php";
require_once "./Views/CategoriaView.php";

class CategoriaController {

    private $model;
    private $view;

	function __construct(){        
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
        session_start();
        verifySession();
    }

    function verifySession(){
        if(isset($_SESSION["user_id"])){
            return false;
        }
        return true;
    }


    public function getCategorias(){
        $categorias = $this->model->getCategorias();
        return $categorias;
    }

    public function nuevaCategoria(){
        if (verifySession()){
            $nombre = $_POST['nombre_categoria'];
            $descripcion = $_POST['descripcion_categoria'];
            $result = $this->model->nuevaCategoria($nombre,$descripcion);
            header('Location: '.URL_ADMIN);
        } else {
            header('Location: '.URL_LOGIN);
        }
    }

    public function editCategoria($params = null){
        if (verifySession()){
            $id = $params[':id'];
            $nombre = $_POST['nombre_categoria'];
            $descripcion = $_POST['descripcion_categoria'];
            $this->model->editCategoria($id,$nombre,$descripcion);
            header('Location: '.URL_ADMIN);
        } else {
            header('Location: '.URL_LOGIN);
        }
    }

    public function deleteCategoria($params = null){
        if (verifySession()){
            $id = $params[':id'];
            if ($id){
                $this->model->deleteCategoria($id);
                header('Location: '.URL_ADMIN);
            } else {
                // Armar Error y mostrar
                header('Location: '.URL_ADMIN);
            }
        } else {
            header('Location: '.URL_LOGIN);
        }
    }

    public function getCategoriaById($params = null){
        $id = $params[':id'];
        if ($id){
            $categoria = $this->model->getCategoriaById($id);
            $this->view->mostrarCategoria($categoria);
        } else {
            // Armar Error y mostrar
            header('Location: '.URL_ADMIN);
        }
    }
}
?>