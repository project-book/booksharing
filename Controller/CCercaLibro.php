<?php

/**
 * Class CLibri
 * Controller che si occupa di ricercare un libro ed eventualmente proporre uno scambio ad un utente.
 */
class CCercaLibro
{
    /**
     *Permette di ricercare i libri in base ai parametri di ricerca prelevati dalla view.
     */
    public function ricerca()
    {
            $VRicerca = new VCercaLibro();
            if(CUtente::isLogged()==true) {
            $t = array();
            $t['titolo'] = $VRicerca->gettitolo();
            $t['autore'] = $VRicerca->getautore();
            $t['editore'] = $VRicerca->geteditore();
            $t['genere'] = $VRicerca->getgenere();
            $t['anno'] = $VRicerca->getanno();
            $t['condizione'] = $VRicerca->getcondizione();

            $x = new FPersistentManager();
            $y = array();

                foreach ($t as $k => $v) {
                    if ($v != NULL)
                        $y[$k] = $v;
                }


            $y['esaurito']=0;
            $s['user']=$_SESSION['user'];
            $libri = $x->search('Cartaceo',$s,'');
            $l=$x->search('Cartaceo', $y, '');

            $tt=array();
            $ll=array();

            foreach ($libri as $libr)
                if($libr->getstato()==0)
                    array_push($ll,$libr);

            foreach ($l as $k)
            {
                $x=$k->getUser()->getuser();
                $a['valutato']=$x;
                $u=new FPersistentManager();
                $uu=$u->search('Valutazione',$a,'');
                $c=array();
                foreach ($uu as $i)
                    array_push($c,$i->getVoto());

                $r=$u->load('Registrato',$x);
                $tt[$x]=$r->calcolamedia($c);
            }

            $i=0;
               foreach ($l as $k)
               {
                   if($k->getUser()->getuser()==$_SESSION['user'])
                   unset($l[$i]);
                   $i++;
               }
            $VRicerca->showresult($l, $ll,$tt,'');
        }
        else $VRicerca->Login();
    }
//

    /**
     *Funzione che permette di proporre lo scambio un altro utente.
     */
    public function scambia()
    {
        $v=new VCercaLibro();
        $vv=new VUtente();
        if(CUtente::islogged()) {

            if (empty($_POST['LibroPersonale'])) {
                print 'ciao';
                $e = new VErrore();
                $e->ERRORE('Per proporre uno scambio bisogna selezionare un proprio libro da offrire all\'altro utente');
                exit;
            }
            if (empty($_POST['LibroRichiesto'])) {
                $e = new VErrore();
                $e->ERRORE('Per proporre uno scambio bisogna selezionare un libro che si desidera acquisire dall\'altro utente');
                exit;
            }

            $x = new FPersistentManager();
            $xx = $_POST['LibroPersonale'];
            $ll = $_POST['LibroRichiesto'];
            $t = explode('/', $xx);
            $tt = explode('/', $ll);
            unset($t[3]);
            unset($tt[3]);
            $y = $x->load('Cartaceo', $t);
            $yy = $x->load('Cartaceo', $tt);

            $p = new EProposta($y, $yy, '', 685);
            $x->store($p);
            $v->showlibro($p);
        }
        else $vv->inserimento('Sessione scaduta');
    }


}
