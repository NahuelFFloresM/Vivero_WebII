<?php

require_once('libs/Smarty.class.php');

class ProductoView {

    function __construct(){
        
    }

    public function DisplayHome() {

        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/productos.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }

    public function mostrarProductos($productos){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('productos',$productos);
        $smarty->display('templates/productos.tpl');
    }

    public function mostrarDetalle($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('templates/detalle.tpl');
    }

    function showTask($task) {
        
    }

}

?>