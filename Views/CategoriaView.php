<?php

require_once('libs/Smarty.class.php');

class CategoriaView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function mostrarCategoria($categoria){
        $this->smarty->assign('categoria',$categoria);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        $this->smarty->display('templates/categorias.tpl');
    }

    public function DisplayAdmin($categorias) {
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('selectCate',$categorias);
        $this->smarty->assign('logged',true);
        $this->smarty->display('templates/admin.tpl');
    }

}

?>
