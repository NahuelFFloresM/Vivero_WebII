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
        $this->verifySession();
    }

    function verifySession(){
        if(isset($_SESSION["user_id"])){
            return false;
        }
        return true;
    }
    
    private function isAdmin(){
        if(isset($_SESSION["permisos"]) && ($_SESSION["permisos"] == 1)){
            return true;
        }
        return false;
    }


    public function getCategorias(){
        if ($this->isAdmin()){
            $categorias = $this->model->getCategorias();
            $this->view->DisplayAdmin($categorias);
        } else {
            header("Location: ".URL_HOME);
            die;
        }
    }

    public function nuevaCategoria(){
        if ($this->isAdmin()){
            $nombre = $_POST['nombre_categoria'];
            $descripcion = $_POST['descripcion_categoria'];
            $result = $this->model->nuevaCategoria($nombre,$descripcion);
            header('Location: '.URL_ADMIN.'/categorias');
        } else {
            header('Location: '.URL_HOME);
        }
    }

    public function editCategoria($params = null){
        if ($this->isAdmin()){
            $id = $params[':id'];
            $nombre = $_POST['nombre_categoria'];
            $descripcion = $_POST['descripcion_categoria'];
            $this->model->editCategoria($id,$nombre,$descripcion);
            header('Location: '.URL_ADMIN.'/categorias');
        } else {
            header('Location: '.URL_LOGIN);
        }
    }

    public function deleteCategoria($params = null){
        if ($this->isAdmin()){
            $id = $params[':id'];
            if ($id){
                $this->model->deleteCategoria($id);
                header('Location: '.URL_ADMIN.'/categorias');
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