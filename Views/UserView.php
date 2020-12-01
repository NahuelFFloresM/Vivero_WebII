<?php

require_once('libs/Smarty.class.php');

class UserView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayAdmin($categorias,$usuarios) {
        $this->smarty->assign('usuarios',$usuarios);
        $this->smarty->assign('selectCate',$categorias);
        $this->smarty->assign('logged',true);
        $this->smarty->display('templates/admin.tpl');
    }
    public function DisplayEditUser($categorias,$user) {
        $this->smarty->assign('edit_user',$user);
        $this->smarty->assign('isAdmin',true);
        $this->smarty->assign('selectCate',$categorias);
        $this->smarty->assign('selector_options',array(
            1 => 'Admin',
            0 => 'Publico'
        ));
        $this->smarty->assign('logged',true);
        $this->smarty->display('templates/admin.tpl');
    }

    

}

?>