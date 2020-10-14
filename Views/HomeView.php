<?php

require_once('libs/Smarty.class.php');

class HomeView {

    function __construct(){
    }

    public function DisplayHome() {

        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/home.tpl');
    }
    
    public function showError($msg) {
        echo $msg;
    }
}

?>