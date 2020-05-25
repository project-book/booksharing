<?php


class CUtente
{
    public function registra()
    {
        $VRegistra=new VUtente();
        $i= new EIndirizzo($VRegistra->getvia(),$VRegistra->getncivico(),$VRegistra->getcap(),$VRegistra->getcomune(),$VRegistra->getprovincia());
        $r= new ERegistrato($VRegistra->getuser(),$VRegistra->getpassword(),$VRegistra->getnome(),$VRegistra->getcognome(),$VRegistra->getemail(),$i,0);
        $x=new FPersistentManager();
        $VRegistra->showresult($x->store($r));
    }
}