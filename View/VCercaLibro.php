<?php


class VCercaLibro
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function gettitolo()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['titolo'];
        return $value;
    }

    public function showResult($result){

        $this->smarty->assign('array', $result);
        //mostro la home con i risultati della query
        $this->smarty->display('ricerca.tpl');
    }

}
?>