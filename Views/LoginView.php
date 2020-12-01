<?php

require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty; 

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayLogin() {
        $this->smarty->assign('login',true);
        $this->smarty->display('templates/login.tpl');
    }

    public function DisplayRegister() {
        $this->smarty->assign('register',true);
        $this->smarty->display('templates/login.tpl');
    }

    public function DisplayAdmin($productos,$categorias) {
        $this->smarty->assign('productos',$productos);
        $this->smarty->assign('selectCate',$categorias);
        $this->smarty->assign('isAdmin',true);
        $this->smarty->assign('logged',true);
        $this->smarty->display('templates/admin.tpl');
    }

    public function showLoginError($msg) {
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->assign('error',$msg);
        $this->smarty->display('templates/login.tpl');
    }

    

    public function showError($msg) {
        echo $msg;
    }
}

?>