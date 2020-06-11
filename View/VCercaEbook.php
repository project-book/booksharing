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
        if (isset($_POST['titolo']))
            $value = $_POST['titolo'];
        return $value;
    }

    public function getautore()
    {
        $value = NULL;
        if (isset($_POST['autore']))
            $value = $_POST['autore'];
        return $value;
    }

    public function geteditore()
    {
        $value = NULL;
        if (isset($_POST['editore']))
            $value = $_POST['editore'];
        return $value;
    }

    public function getanno()
    {
        $value = NULL;
        if (isset($_POST['anno']))
            $value = $_POST['anno'];
        return $value;
    }

    public function getgenere()
    {
        $value = NULL;
        if (isset($_POST['genere']))
            $value = $_POST['genere'];
        return $value;
    }

    public function getprezzo()
    {
        $value = NULL;
        if (isset($_POST['prezzo_punti']))
            $value = $_POST['prezzo_punti'];
        return $value;
    }

    public function showResult($result,$u){

        $this->smarty->assign('array', $result);
        $this->smarty->assign('user', $u);
        $this->smarty->display('ricercaebook.tpl');
    }

    public function Compra($e,$m,$s)
    {
        $this->smarty->assign('ebook', $e);
        $this->smarty->assign('email', $m);
        $this->smarty->assign('saldo', $s);
        $this->smarty->display('riepilogoebook.tpl');
    }

    public function Login()
    {
        $this->smarty->assign('errore','prima di effettuare una ricerca devi essere registrato');
        $this->smarty->display('login.tpl');
    }

    public function saldoinsuff($t,$mess,$e)
    {
        $this->smarty->assign('user', $t);
        $this->smarty->assign('mess', $mess);
        $this->smarty->assign('array', $e);
        $this->smarty->display('ricercaebook.tpl');
    }

}