<?php


/**
 * Class VUtente
 * View che si occupa di indirizzare ai template utili per la gestione delle informazioni utente e di passare le informazioni
 * di registrazione dell'user al controller che salverà le info nel db.
 */
class VUtente
{
    /**
     * @var smarty
     */
    private $smarty;

    /**
     * VUtente constructor.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * @return mixed|null
     *Preleva l'user dalla richiesta http post.
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
     *Preleva la password dalla richiesta http post.
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
     *Preleva il nome utente dalla richiesta http post.
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
     *Preleva il cognome dalla richiesta http post.
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
     *Preleva l'email dalla richiesta http post.
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
     *Preleva la via dalla richiesta http post.
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
     *Preleva il numero civico dalla richiesta http post.
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
     *Preleva il cap dalla richiesta http post.
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
     *Preleva il comune dalla richiesta http post.
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
     *Preleva la provincia dalla richiesta http post.
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
     */
    public function getcommento()
    {
        $value = NULL;
        if (isset($_POST['commento']))
            $value = $_POST['commento'];
        return $value;
    }


    public function getfile()
    {
        $value = NULL;
        if (isset($_FILES))
            $value = $_FILES;
        return $value;
    }




    //indirizza alla pagina di log in

    /**
     * @throws SmartyException
     * Indirizza alla pagina di login.
     */
    public function inserimento($m)
    {
        $this->smarty->assign('errore',NULL);
        $this->smarty->assign('messaggio',$m);
        $this->smarty->display('login.tpl');
    }

    /**
     * @throws SmartyException
     * Indirizza alla home del registrato.
     */
    public function home()
    {
        $this->smarty->assign('nome',$_SESSION['user']);
        $this->smarty->display('indexreg.tpl');
    }

    /**
     * @param $m
     * @param $comune
     * @param $province
     * @param $cap
     * @throws SmartyException
     * Indirizza alla pagina di registrazione.
     */
    public function registra($m, $comune, $province, $cap)
    {
        $psw="[A-Za-z0-9]{3,15}";
        $email="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";
        $N="[0-9]{1,5}";
        $v="[A-Za-z0-9'\.\-\s\,]{2,20}";
        $cognome="[A-Za-z]{1,15}";
        $nome="[A-Za-z]{1,15}";

        $this->smarty->assign('comune',$comune);
        $this->smarty->assign('cap',$cap);
        $this->smarty->assign('province',$province);
        $this->smarty->assign('nome',$nome);
        $this->smarty->assign('psw',$psw);
        $this->smarty->assign('email',$email);
        $this->smarty->assign('v',$v);
        $this->smarty->assign('N',$N);
        $this->smarty->assign('cognome',$cognome);
        $this->smarty->assign('messaggio', $m);
        $this->smarty->display('registrati.tpl');
    }


    /**
     * @throws SmartyException
     * Messaggio di errore per dati di log in errati.
     */
    public function errore()
    {
        $this->smarty->assign('errore','Errore');
        $this->smarty->display('login.tpl');
    }

    /**
     * @param $r
     * @param $e
     * @param $p
     * @param $pr
     * @param $pi
     * @param $l
     * @param $c
     * @throws SmartyException
     * Indirizza alla pagina contenenti le informazioni profilo.
     */

    public function profilo($r, $e, $p, $pinv, $pric, $l, $c,$i)

    {
        $this->smarty->assign('ricevute',$r);
        $this->smarty->assign('effettuate',$e);
        $this->smarty->assign('propric',$pric);
        $this->smarty->assign('propinv',$pinv);
        $this->smarty->assign('dati',$p);
        $this->smarty->assign('libri',$l);
        $this->smarty->assign('concluse',$c);
        $this->smarty->assign('immagine',$i);
        $this->smarty->display('profilo.tpl');
    }

    /**
     * @param $u
     * @param $id
     * @throws SmartyException
     * Indirizza alla pagina contenente la form per compilare la recensione.
     */
    public function recensione($u, $id,$m)
    {
            $this->smarty->assign('m',$m);

        $this->smarty->assign('user',$u);
        $this->smarty->assign('id',$id);
        $this->smarty->display('recensione.tpl');
    }

    /**
     * @throws SmartyException
     * Indirizza alla pagina profilo dopo aver aggiornato le informazioni.
     */
    public function aggiornautente()
    {
        $this->smarty->assign('ok','Dati aggiornati correttamente');
        $this->smarty->display('profilo.tpl');
    }

    /**
     * @param $u
     * @param $m
     * @param $ca
     * @param $province
     * @param $comuni
     * @throws SmartyException
     * Indirizza alla pagina contenente la form per modificare i dati utente.
     */
    public function modificautente($u, $m, $ca, $province, $comuni)
    {

        $psw="[A-Za-z0-9]{3,15}";
        $email="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";
        $N="[0-9]{1,5}";
        $v="[A-Za-z0-9'\.\-\s\,]{2,20}";

        $this->smarty->assign('user',$u);
        $this->smarty->assign('cap',$ca);
        $this->smarty->assign('psw',$psw);
        $this->smarty->assign('email',$email);
        $this->smarty->assign('v',$v);
        $this->smarty->assign('N',$N);
        $this->smarty->assign('comune',$comuni);
        $this->smarty->assign('province',$province);
        if($m!='')
            $this->smarty->assign('messaggio',$m);
        $this->smarty->display('modificautente.tpl');
    }

    /**
     * @param $u
     * @param $l
     * @param $v
     * @throws SmartyException
     * Indirizza alla pagina contenente i dati dell'utente selezionato.
     */
    public function dettagliutente($u, $l, $v,$i,$b)
    {
        $this->smarty->assign('user',$u);
        $this->smarty->assign('libri',$l);
        $this->smarty->assign('valutazione',$v);
        $this->smarty->assign('immagine',$i);
        $this->smarty->assign('bool',$b);
        $this->smarty->display('dettagliutente.tpl');

    }

    /**
     * @param $prop
     * @throws SmartyException
     * Indrizza alla pagina di riepilogo scambio.
     */
    public function scambioconfermato($prop)
    {
        $this->smarty->assign('prop',$prop);
        $this->smarty->display('scambioconfermato.tpl');
    }

}







