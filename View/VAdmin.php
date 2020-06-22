<?php


/**
 * Class VAdmin
 * View che si occupa di prelevare dalla richiesta http le informazioni da passare al controller opportuno e
 * permette di indirizzare ai template utili ai casi d'uso dell'admin.
 */
class VAdmin
{
    /**
     * @var smarty
     */
    private $smarty;

    /**
     * VAdmin constructor
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }


    public function getfile()
    {
        $value = NULL;
        if (isset($_FILES))
            $value = $_FILES;
        return $value;
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
     * Preleva il prezzo del libro dalla richiesta post http.
     */
    public function getprezzo()
    {
        $value = NULL;
        if (isset($_POST['prezzo_punti']))
            $value = $_POST['prezzo_punti'];
        return $value;
    }

    /**
     * @return mixed|null

     */
    public function getmodfica()
    {
        $value = NULL;
        if (isset($_POST['modifica']))
            $value = $_POST['modifica'];
        return $value;
    }

    /**
     * @return mixed|null
     * <
     */
    public function getelimina()
    {
        $value = NULL;
        if (isset($_POST['elimina']))
            $value = $_POST['elimina'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva L'user che possiede libro dalla richiesta post http.
     */
    public function getuser()
    {
        $value = NULL;
        if (isset($_POST['user']))
            $value = $_POST['user'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva la password dalla richiesta post http.
     */
    public function getpassword()
    {
        $value = NULL;
        if (isset($_POST['password']))
            $value = $_POST['password'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getnome()
    {
        $value = NULL;
        if (isset($_POST['nome']))
            $value = $_POST['nome'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getcognome()
    {
        $value = NULL;
        if (isset($_POST['cognome']))
            $value = $_POST['cognome'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getemail()
    {
        $value = NULL;
        if (isset($_POST['email']))
            $value = $_POST['email'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva la via dalla richiesta post http.
     */
    public function getvia()
    {
        $value = NULL;
        if (isset($_POST['via']))
            $value = $_POST['via'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva il numero civico dalla richiesta post http.
     */
    public function getncivico()
    {
        $value = NULL;
        if (isset($_POST['ncivico']))
            $value = $_POST['ncivico'];
        return $value;
    }



    /**
     * @return mixed|null
     * Preleva il cap dalla richiesta post http.
     */
    public function getcap()
    {
        $value = NULL;
        if (isset($_POST['cap']))
            $value = $_POST['cap'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva il comune dalla richiesta post http.
     */
    public function getcomune()
    {
        $value = NULL;
        if (isset($_POST['comune']))
            $value = $_POST['comune'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva la provincia dalla richiesta post http.
     */
    public function getprovincia()
    {
        $value = NULL;
        if (isset($_POST['provincia']))
            $value = $_POST['provincia'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getida()
    {
        $value = NULL;
        if (isset($_POST['ida']))
            $value = $_POST['ida'];
        return $value;
    }

    /**
     * @return mixed|null
     */
    public function getidr()
    {
        $value = NULL;
        if (isset($_POST['idr']))
            $value = $_POST['idr'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva la recensione dalla richiesta post http.
     */
    public function getrecensione()
    {
        $value = NULL;
        if (isset($_POST['recensione']))
            $value = $_POST['recensione'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva il voto dalla richiesta post http.
     */
    public function getvoto()
    {
        $value = NULL;
        if (isset($_POST['voto']))
            $value = $_POST['voto'];
        return $value;
    }

    /**
     * @return mixed|null
     * Preleva il commento dalla richiesta post http.
     */
    public function getcommento()
    {
        $value = NULL;
        if (isset($_POST['commento']))
            $value = $_POST['commento'];
        return $value;
    }



    /**
     * @throws SmartyException
     * Indirizza alla home dell'admin.
     */
    public function homeadmin($u,$m)
    {
        $this->smarty->assign('nome',$u);
        $this->smarty->assign('m',$m);
        $this->smarty->display('adminreg.tpl');
    }

    /**
     * @param $result
     * @param $u
     * @throws SmartyException
     * Indirizza alla pagina contenente i risultati di ricerca ebook.
     */
    public function ebookresult($result, $u){

        $this->smarty->assign('array', $result);

        $this->smarty->assign('user', $u);
        $this->smarty->display('ebookadmin.tpl');
    }

    /**
     * @throws SmartyException
     * Indirizza alla pagina di modifica dell'ebook.
     */
    public function modificaebook($ebook){

        $this->smarty->assign('ebook', $ebook);

        $this->smarty->display('modificaebook.tpl');

    }

    /**
     * @param $result
     * @throws SmartyException
     * Indirizza alla pagina contentente gli utenti ricercati dall'admin
     */
    public function utenteresult($result){

        $this->smarty->assign('array', $result);

        $this->smarty->display('utenteadmin.tpl');
    }

}