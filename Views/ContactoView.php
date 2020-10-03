<?php

require_once('libs/Smarty.class.php');

class ContactoView {

    private $smarty;

    function __construct(){
        //$this->smarty = new Smarty;
    }

    public function DisplayContacto() {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/contacto.tpl');
    }

}

?>
