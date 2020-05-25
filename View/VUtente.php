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
    public function inserimento()
    {
        $this->smarty->display('login.tpl');
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


    public function login()
    {
        $this->smarty->assign('nome',$_POST['user']);
        $this->smarty->display('indexreg.tpl');
    }
    public function showResult($result){

        $this->smarty->assign('registrato', $result);
        //mostro la home con i risultati della query
        $this->smarty->display('index.tpl');
    }
public function errore()
{
    $this->smarty->assign('errore','Errore');
    $this->smarty->display('login.tpl');
}
}







