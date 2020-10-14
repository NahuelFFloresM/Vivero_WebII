<?php

require_once('libs/Smarty.class.php');

class ProductoView {

    function __construct(){
        
    }

    public function DisplayHome() {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/productos.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }

    public function mostrarProductos($productos,$categorias){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('productos',$productos);
        $smarty->assign('categorias',$categorias);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/productos.tpl');
    }

    public function mostrarDetalle($producto = []){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('producto', $producto);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/detalle.tpl');
    }

    public function mostrarEditProducto($producto = [],$categorias = []){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('producto',$producto);
        $smarty->assign('categorias',$categorias);
        $smarty->assign('edit',true);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/detalle.tpl');
    }
}

?>