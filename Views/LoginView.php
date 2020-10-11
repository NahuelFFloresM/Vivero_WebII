<?php

require_once('libs/Smarty.class.php');

class LoginView {

    function __construct(){
        
    }

    public function DisplayLogin() {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/login.tpl');
    }

    public function DisplayAdmin($productos) {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('productos',$productos);
        $smarty->display('templates/admin.tpl');
    }

    public function showLoginError($msg) {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('error',$msg);
        $smarty->display('templates/login.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }
}

?>