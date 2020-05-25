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
        if (isset($_POST))
            $value = $_POST['user'];
        return $value;
    }

    public function getpassword()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['password'];
        return $value;
    }

    public function getnome()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['nome'];
        return $value;
    }
    public function getcognome()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['cognome'];
        return $value;
    }
    public function getemail()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['email'];
        return $value;
    }
    public function getvia()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['via'];
        return $value;
    }
    public function getncivico()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['ncivico'];
        return $value;
    }
    public function getcap()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['cap'];
        return $value;
    }
    public function getcomune()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['comune'];
        return $value;
    }
    public function getprovincia()
    {
        $value = NULL;
        if (isset($_POST))
            $value = $_POST['provincia'];
        return $value;
    }

    //indirizza alla pagina di log in
    public function inserimento()
    {
        $this->smarty->assign('errore',NULL);
        $this->smarty->display('login.tpl');
    }
//REINDIRIZZA ALLA HOME DEL REGISTRATO
    public function login()
    {
        $this->smarty->assign('nome',$_SESSION['user']);
        $this->smarty->display('indexreg.tpl');
    }


public function registra()
{
    $this->smarty->display('registrati.tpl');
}
    //messaggio di errore per dati di log errati
public function errore()
{
    $this->smarty->assign('errore','Errore');
    $this->smarty->display('login.tpl');
}
}







