<?php


class VAdmin
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

    public function getmodfica()
    {
        $value = NULL;
        if (isset($_POST['modifica']))
            $value = $_POST['modifica'];
        return $value;
    }

    public function getelimina()
    {
        $value = NULL;
        if (isset($_POST['elimina']))
            $value = $_POST['elimina'];
        return $value;
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




    public function homeadmin()
    {
        $this->smarty->assign('nome',$_SESSION['user']);
        $this->smarty->display('adminreg.tpl');
    }

    public function ebookresult($result,$u){

        $this->smarty->assign('array', $result);
        $this->smarty->assign('user', $u);
        $this->smarty->display('ebookadmin.tpl');
    }

    public function modificaebook(){

        $this->smarty->display('modificaebook.tpl');

    }

    public function utenteresult($result){

        $this->smarty->assign('array', $result);

        $this->smarty->display('utenteadmin.tpl');
    }
}