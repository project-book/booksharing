<?php


class VCercaEbook
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
    public function getautore()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['autore'];
        return $value;
    }
    public function geteditore()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['editore'];
        return $value;
    }
    public function getanno()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['anno'];
        return $value;
    }
    public function getgenere()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['genere'];
        return $value;
    }
    public function getprezzo()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['prezzo_punti'];
        return $value;
    }

    public function showResult($result){

        $this->smarty->assign('array', $result);
        //mostro la home con i risultati della query
        $this->smarty->display('ricercaebook.tpl');
    }

}