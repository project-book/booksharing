<?php


/**
 * Class VCercaLibro
 * View che si occupa di prelevare dalla richiesta http le informazioni inserite dall'utente e
 * permette di indirizzare ai template utili a ricercare libri e proporre scambi ad altri utenti.
 */
class VCercaLibro
{

    /**
     * @var smarty
     */
    private $smarty;

    /**
     * VCercaLibro constructor.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * @return mixed|null
     * Preleva il titolo del libro dalla richiesta post http.
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
     * Preleva l'autore del libro dalla richiesta post http.
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
     * Preleva l'editore del libro dalla richiesta post http.
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
     * Preleva l'anno del libro dalla richiesta post http.
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
     * Preleva il genere del libro dalla richiesta post http.
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
     * Preleva le condizioni del libro dalla richiesta post http.
     */
    public function getcondizione()
    {
        $value = NULL;
        if (isset($_POST['condizione']))
            $value = $_POST['condizione'];
        return $value;
    }

    /**
     * @throws SmartyException
     *Indirizza alla pagina di login.
     */
    public function Login()
    {
        $this->smarty->assign('messaggio','');
        $this->smarty->assign('errore','prima di effettuare una ricerca devi essere registrato');
        $this->smarty->display('login.tpl');
    }

    /**
     * @param $lr
     * @param $lp
     * @param $tt
     * @throws SmartyException
     *Indirizza alla pagina contente i risultati di ricerca.
     */
    public function showResult($lr, $lp, $tt){

        $this->smarty->assign('libriricercati', $lr);
        $this->smarty->assign('libriposseduti', $lp);
        $this->smarty->assign('media',$tt);
        //mostro la home con i risultati della query
        $this->smarty->display('ricercalibro.tpl');
    }

    //CARICA LA PAGINA DI RIEPILOGO PROPOSTA

    /**
     * @param $p
     * @throws SmartyException
     * Indirizza alla pagina di riepilogo dello scambio.
     */
    public function showlibro($p)
    {
        $this->smarty->assign('prop',$p);
        $this->smarty->display('riepilogoscambio.tpl');
    }

}
?>