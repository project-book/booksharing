<?php


/**
 * Class VCercaEbook
 * View che si occupa di prelevare le informazioni dalle richieste http e indirizzare a template.
 * Operazioni utili all'utente per ricercare ebook e acquistarli.
 */
class VCercaEbook
{
    /**
     * @var smarty
     */
    private $smarty;

    /**
     * VCercaEbook constructor.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * @return mixed|null
     * Preleva il titolo dell'ebook dalla richiesta post http.
     */
    public function gettitolo()
    {
        $value = NULL;
        if (isset($_POST['titolo']))
            $value = $_POST['titolo'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getautore()
    {
        $value = NULL;
        if (isset($_POST['autore']))
            $value = $_POST['autore'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function geteditore()
    {
        $value = NULL;
        if (isset($_POST['editore']))
            $value = $_POST['editore'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getanno()
    {
        $value = NULL;
        if (isset($_POST['anno']))
            $value = $_POST['anno'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getgenere()
    {
        $value = NULL;
        if (isset($_POST['genere']))
            $value = $_POST['genere'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getprezzo()
    {
        $value = NULL;
        if (isset($_POST['prezzo_punti']))
            $value = $_POST['prezzo_punti'];
        return $value;
    }

    /**
     * @param $result
     * @param $u
     * @throws SmartyException
     */
    public function showResult($result, $u){

        $this->smarty->assign('array', $result);
        $this->smarty->assign('user', $u);
        $this->smarty->display('ricercaebook.tpl');
    }

    /**
     * @param $e
     * @param $m
     * @param $s
     * @throws SmartyException
     */
    public function Compra($e, $m, $s)
    {
        $this->smarty->assign('ebook', $e);
        $this->smarty->assign('email', $m);
        $this->smarty->assign('saldo', $s);
        $this->smarty->display('riepilogoebook.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function Login()
    {
        $this->smarty->assign('errore','prima di effettuare una ricerca devi essere registrato');
        $this->smarty->display('login.tpl');
    }

    /**
     * @param $t
     * @param $mess
     * @param $e
     * @throws SmartyException
     */
    public function saldoinsuff($t, $mess, $e)
    {
        $this->smarty->assign('user', $t);
        $this->smarty->assign('mess', $mess);
        $this->smarty->assign('array', $e);
        $this->smarty->display('ricercaebook.tpl');
    }

}