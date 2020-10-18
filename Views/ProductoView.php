<?php

require_once('libs/Smarty.class.php');

class ProductoView {
    
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayHome() {
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->display('templates/productos.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }

    public function mostrarProductos($productos,$categorias){
        $this->smarty->assign('productos',$productos);
        $this->smarty->assign('categorias',$categorias);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->display('templates/productos.tpl');
    }

    public function mostrarDetalle($producto = []){
        $this->smarty->assign('producto', $producto);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->display('templates/detalle.tpl');
    }

    public function mostrarEditProducto($producto = [],$categorias = []){
        $this->smarty->assign('producto',$producto);
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('edit',true);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->display('templates/detalle.tpl');
    }
}

?>