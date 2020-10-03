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

    public function showLoginError($msg) {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('error',$errormsg);
        $smarty->display('templates/login.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }



}

?>