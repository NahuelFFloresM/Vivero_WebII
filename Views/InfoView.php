<?php

require_once('libs/Smarty.class.php');

class InfoView {

    private $smarty;

    function __construct(){
    }

    public function DisplayInfo() {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL',BASE_URL);
        if (isset($_SESSION['username'])){
            $smarty->assign('logged',true);
        }
        $smarty->display('templates/info.tpl');
    }

}

?>