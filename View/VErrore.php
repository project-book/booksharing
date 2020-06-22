<?php


class VErrore
{

    private $smarty;

    public function __construct()
{
    $this->smarty = StartSmarty::configuration();
}
    public function ERRORE($m){
    $this->smarty->assign('messaggio', $m);
    $this->smarty->display('errore.tpl');
}


}
?>