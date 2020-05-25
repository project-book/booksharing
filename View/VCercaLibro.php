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
    public function getcondizione()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['condizione'];
        return $value;
    }

    public function Login()
    {
        $this->smarty->assign('errore','prima di effettuare una ricerca devi essere registrato');
        $this->smarty->display('login.tpl');
    }
    public function showResult($lr,$lp){

        $this->smarty->assign('libriricercati', $lr);
        $this->smarty->assign('libriposseduti', $lp);
        //mostro la home con i risultati della query
        $this->smarty->display('ricercalibro.tpl');
    }

    //CARICA LA PAGINA DI RIEPILOGO PROPOSTA
    public function showlibro($l,$ll)
    {
        $x=$l->getobj();
        $xx=$ll->getobj();

        $this->smarty->assign('LibroRichiesto',$x);
        $this->smarty->assign('LibroProposto',$xx);
        $this->smarty->display('riepilogoscambio.tpl');
    }

}
?>