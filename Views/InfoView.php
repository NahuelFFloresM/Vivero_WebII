<?php

require_once('libs/Smarty.class.php');

class InfoView {

    private $smarty;

    function __construct(){
        //$this->smarty = new Smarty;
    }

    public function DisplayInfo() {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/info.tpl');
    }

}

?>