<?php

require_once('libs/Smarty.class.php');

class ContactoView {

    private $smarty;

    function __construct(){
        session_start();
    }

    public function DisplayContacto() {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/contacto.tpl');
    }

}

?>
