<?php

require_once('libs/Smarty.class.php');

class InfoView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }

    public function DisplayInfo() {
        if (isset($_SESSION['username'])){
            $this->smarty->assign('logged',true);
        }
        $this->smarty->display('templates/info.tpl');
    }

}

?>