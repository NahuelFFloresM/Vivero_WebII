<?php
require_once "./Views/HomeView.php";

class HomeController {

    private $view;

	function __construct(){
        
        $this->view = new HomeView();
        session_start();

    }
    
    public function getHome(){
        
        $this->view->DisplayHome();
    }
}


?>