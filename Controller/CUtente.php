<?php


class CUtente
{
    //registra dati nel database
    public function Salvadati()
    {
        $VRegistra=new VUtente();
        $i= new EIndirizzo($VRegistra->getvia(),$VRegistra->getncivico(),$VRegistra->getcap(),$VRegistra->getcomune(),$VRegistra->getprovincia());
        $r= new ERegistrato($VRegistra->getuser(),$VRegistra->getpassword(),$VRegistra->getnome(),$VRegistra->getcognome(),$VRegistra->getemail(),$i,0);
        $x=new FPersistentManager();
        $x->store($r);
        $VRegistra->inserimento();
    }

    //VERIFICA CHE LE CREDENZIALI ESISTANO
    public function verifica():bool
    {
        $t=array();
        $t['user']=$_POST['user'];
        $x=new FPersistentManager();
        if(!empty($x->search('Registrato',$t,''))) {
            $r = $x->load('Registrato', $_POST['user']);
            if ($r->getpsw() == $_POST['password'])
                $b= true;
            else
                $b= false;
        }
        else $b= false;
        return $b;
    }


    //reindirizza alla pagina di log in
    public function inserimento()
    {
        $v=new VUtente();
        $v->inserimento();
    }


//logga l'utente
    public function login()
    {
        $v=new VUtente();
            if (static::verifica() == true) {
                session_start();
                $_SESSION['user'] = $v->getuser();
                $v->login();
            } else
                $v->errore();
        }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location:/booksharing/Smarty-dir/html/login.html');
    }

    public function registra()
    {
        $V=new VUtente();
        $V->registra();
    }

    public function profilo()
    {

    }
    public function isLogged()
    {
        $identificato = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                    }
                }
                if (isset($_SESSION['user'])) {
                    $identificato = true;
                }
                return $identificato;
            }
}