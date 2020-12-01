<?php

require_once('libs/Smarty.class.php');

class HomeView {
    
    private $smarty; 

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayHome() {
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        $this->smarty->display('templates/home.tpl');
    }
    
    public function showError($msg) {
        echo $msg;
    }
}

?>