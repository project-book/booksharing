<?php


class VUtente
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function getuser()
    {
        $value = NULL;
        if (isset($_POST['user']))
            $value = $_POST['user'];
        return $value;
    }

    public function getpassword()
    {
        $value = NULL;
        if (isset($_POST['password']))
            $value = $_POST['password'];
        return $value;
    }

    public function getnome()
    {
        $value = NULL;
        if (isset($_POST['nome']))
            $value = $_POST['nome'];
        return $value;
    }

    public function getcognome()
    {
        $value = NULL;
        if (isset($_POST['cognome']))
            $value = $_POST['cognome'];
        return $value;
    }

    public function getemail()
    {
        $value = NULL;
        if (isset($_POST['email']))
            $value = $_POST['email'];
        return $value;
    }

    public function getvia()
    {
        $value = NULL;
        if (isset($_POST['via']))
            $value = $_POST['via'];
        return $value;
    }

    public function getncivico()
    {
        $value = NULL;
        if (isset($_POST['ncivico']))
            $value = $_POST['ncivico'];
        return $value;
    }

    public function getcap()
    {
        $value = NULL;
        if (isset($_POST['cap']))
            $value = $_POST['cap'];
        return $value;
    }

    public function getcomune()
    {
        $value = NULL;
        if (isset($_POST['comune']))
            $value = $_POST['comune'];
        return $value;
    }

    public function getprovincia()
    {
        $value = NULL;
        if (isset($_POST['provincia']))
            $value = $_POST['provincia'];
        return $value;
    }

    public function getida()
    {
        $value = NULL;
        if (isset($_POST['ida']))
            $value = $_POST['ida'];
        return $value;
    }

    public function getidr()
    {
        $value = NULL;
        if (isset($_POST['idr']))
            $value = $_POST['idr'];
        return $value;
    }

    public function getrecensione()
    {
        $value = NULL;
        if (isset($_POST['recensione']))
            $value = $_POST['recensione'];
        return $value;
    }

    public function getvoto()
    {
        $value = NULL;
        if (isset($_POST['voto']))
            $value = $_POST['voto'];
        return $value;
    }

    public function getcommento()
    {
        $value = NULL;
        if (isset($_POST['commento']))
            $value = $_POST['commento'];
        return $value;
    }





    //indirizza alla pagina di log in
    public function inserimento()
    {
        $this->smarty->assign('errore',NULL);
        $this->smarty->display('login.tpl');
    }

    //REINDIRIZZA ALLA HOME DEL REGISTRATO
    public function home()
    {
        $this->smarty->assign('nome',$_SESSION['user']);
        $this->smarty->display('indexreg.tpl');
    }

    public function registra($m,$comune,$province,$cap)
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

    //messaggio di errore per dati di log errati
    public function errore()
    {
        $this->smarty->assign('errore','Errore');
        $this->smarty->display('login.tpl');
    }

    public function profilo($r,$e,$p,$pr,$pi,$l,$c)
    {
        $this->smarty->assign('ricevute',$r);
        $this->smarty->assign('effettuate',$e);
        $this->smarty->assign('propric',$pr);
        $this->smarty->assign('propinv',$pi);
        $this->smarty->assign('dati',$p);
        $this->smarty->assign('libri',$l);
        $this->smarty->assign('concluse',$c);
        $this->smarty->display('profilo.tpl');
    }

    public function recensione($u,$id)
    {
        $this->smarty->assign('user',$u);
        $this->smarty->assign('id',$id);
        $this->smarty->display('recensione.tpl');
    }

    public function aggiornautente()
    {
        $this->smarty->assign('ok','Dati aggiornati correttamente');
        $this->smarty->display('profilo.tpl');
    }

    public function modificautente($u,$m,$ca,$province,$comuni)
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

    public function dettagliutente($u,$l,$v)
    {
        $this->smarty->assign('user',$u);
        $this->smarty->assign('libri',$l);
        $this->smarty->assign('valutazione',$v);
        $this->smarty->display('dettagliutente.tpl');

    }

    public function scambioconfermato($prop)
    {
        $this->smarty->assign('prop',$prop);
        $this->smarty->display('scambioconfermato.tpl');
    }

}







