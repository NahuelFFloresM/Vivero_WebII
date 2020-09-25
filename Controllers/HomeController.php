<?php
require_once "./Models/HomeModel.php";
require_once "./Views/HomeView.php";

class HomeController {

    private $model;
    private $view;

	function __construct(){
        
        // $this->model = new HomeModel();
        $this->view = new HomeView();
    }
    
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    
    public function getHome(){
        $this->view->DisplayHome();
    }

    public function GetTareas(){
        $this->checkLogIn();
        $tareas = $this->model->GetTareas();
        $this->view->DisplayTareas($tareas);
    }

    public function GetTareasCSR() {
        $this->checkLogIn();
        $this->view->DisplayTareasCSR();

    }

    public function InsertarTarea(){
        $this->checkLogIn();
        $finalizada = 0;
        if(isset($_POST['finalizada'])){
            $finalizada = 1;
        }

        // agarra el file
        if ($_FILES['imagen']['name']) {
            if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                
                $this->model->InsertarTarea($_POST['titulo'], $_POST['descripcion'], $_POST['prioridad'], $finalizada, $_FILES['imagen']);
            }
            else {
                $this->view->showError("Formato no aceptado");
                die();
            }
        }
        else {
            $this->model->InsertarTarea($_POST['titulo'], $_POST['descripcion'], $_POST['prioridad'], $finalizada);  
        }

        header("Location: " . BASE_URL);
    }

    public function FinalizarTarea($id){
        $this->checkLogIn();
        $this->model->FinalizarTarea($id);
        header("Location: " . BASE_URL);
    }

    public function BorrarTarea($id){
        $this->checkLogIn();
        $this->model->BorrarTarea($id);
        header("Location: " . BASE_URL);
    }
}


?>