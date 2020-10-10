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
        var_dump($_SESSION);
        die;
        $smarty->assing('user_name',$_SESSION['username']); 
        $smarty->assing('user_id',$_SESSION['id_user']);
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