<?php


class CGestioneMobile
{
    public function dettagliutente($user){
        $v=new VGestioneMobile();
        $p= new FPersistentManager();
        $u=$p->load('Registrato',$user);
        $v->showresult($u);
    }

    public function ricerca($val){
        $v=new VGestioneMobile();
        $p= new FPersistentManager();
        $a=array();
        if (isset($val['titolo'])) $a['titolo'] =  $val['titolo'];
        if (isset($val['autore'])) $a['autore']=  $val['autore'];
        if (isset($val['editore'])) $a['editore'] =  $val['eidtore'];
        if (isset($val['genere'])) $a['genere'] =  $val['genere'];
        if (isset($val['anno'])) $a['anno'] = $val['anno'];
        if (isset($val['condizione'])) $a['condizione'] = $val['condizione'];


        $result = $p->search('Cartaceo',$a,'');
        $v->showresult($result);
    }

    static function loginToken() {
        $view = new VGestioneMobile();
        $dati = json_decode(file_get_contents('php://input'),true);
        $pm = new FPersistentManager();
        $val = $pm->load("Registrato",$dati["user"]);
        if( $val)
            $view->showToken($val);
        else
            $view->showToken("PIPPO");
    }

}