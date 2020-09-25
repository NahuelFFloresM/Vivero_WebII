<?php

require_once('libs/Smarty.class.php');


class HomeView {

    function __construct(){

    }

    public function DisplayHome() {

        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/home.tpl');
    }

    public function DisplayTareasCSR(){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Lista de Tareas CSR");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/ver_tareas_csr.tpl');
    }

    public function showError($msg) {
        echo $msg;
    }
}

?>