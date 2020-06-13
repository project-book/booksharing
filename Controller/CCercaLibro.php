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
            $ordine = '';
            $x = new FPersistentManager();
            $y = array();
            if($t['titolo']!= null || $t['autore']!= null || $t['editore']!= null || $t['genere']!= null || $t['anno']!= null || $t['condizione']!= null){
                foreach ($t as $k => $v) {
                    if ($v != NULL)
                        $y[$k] = $v;
                }
            }
            $y['esaurito']=0;
            $s['user']=$_SESSION['user'];
            $libri = $x->search('Cartaceo',$s,'');
            $l=$x->search('Cartaceo', $y, $ordine);
            $tt=array();
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
            $VRicerca->showresult($l, $libri,$tt);
        }
        else $VRicerca->Login();
    }
//

    /**
     *Funzione che permette di proporre lo scambio un altro utente.
     */
    public function scambia()
    {
        $x=new FPersistentManager();
        $xx=$_POST['LibroPersonale'];
        if(empty($_POST['LibroPersonale']))
            header("Location:/booksharing/Libri/ricerca");
        $ll=$_POST['LibroRichiesto'];
        $t=explode('/',$xx);
        $tt=explode('/',$ll);
        unset($t[3]);
        unset($tt[3]);
        $y=$x->load('Cartaceo',$t);
        $yy=$x->load('Cartaceo',$tt);

        $p=new EProposta($y,$yy,'',685);
        $x->store($p);
        $v=new VCercaLibro();
        $v->showlibro($p);
    }
    public function ordina()
    {

    }

}
