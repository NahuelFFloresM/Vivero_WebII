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
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        $this->smarty->display('templates/productos.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }

    public function mostrarProductos($productos,$categorias,$pagina = null,$total_paginas){
        $this->smarty->assign('productos',$productos);
        $this->smarty->assign('categorias',$categorias);
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        if (!$pagina) {$this->smarty->assign('pagination',1);}
        else $this->smarty->assign('pagination',$pagina);
        $this->smarty->assign('total_paginas',$total_paginas);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->display('templates/productos.tpl');
    }

    public function mostrarBuscados($productos,$categorias,$pagina = null,$total_paginas,$categoria = null,$nombre = null,$precio = null){
        $this->smarty->assign('productos',$productos);
        $this->smarty->assign('categorias',$categorias);
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        // Variables para re buscar por paginacion.
        if ($categoria > 0) $this->smarty->assign('buscarCate',$categoria);
        if ($nombre) $this->smarty->assign('buscarName',$nombre);
        if ($precio > 0) $this->smarty->assign('buscarPrecio',$precio);
        if (!$pagina) {$this->smarty->assign('pagination',1);}
        else $this->smarty->assign('pagination',$pagina);
        $this->smarty->assign('total_paginas',$total_paginas);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->assign('buscador',true);
        $this->smarty->display('templates/productos.tpl');
    }

    public function mostrarDetalle($producto = []){
        $this->smarty->assign('producto', $producto);
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
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
        if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1) ){
            $this->smarty->assign('isAdmin',true);
        }
        $this->smarty->display('templates/detalle.tpl');
    }

    public function DisplayAdmin($productos,$categorias) {
        $this->smarty->assign('productos',$productos);
        $this->smarty->assign('selectCate',$categorias);
        $this->smarty->assign('isAdmin',true);
        $this->smarty->assign('logged',true);
        $this->smarty->display('templates/admin.tpl');
    }
}

?>