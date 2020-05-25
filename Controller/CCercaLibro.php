<?php

class CCercaLibro
{
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
            $classe = 'Cartaceo';
            $x = new FPersistentManager();
            $y = array();
            foreach ($t as $k => $v) {
                if ($v != NULL)
                    $y[$k] = $v;
            }
            $s['user']=$_SESSION['user'];
            $libri = $x->search('Cartaceo',$s,'');
            $l=$x->search($classe, $y, $ordine);
            $i=0;
               foreach ($l as $k)
               {
                   if($k->getUser()->getuser()==$_SESSION['user'])
                   unset($l[$i]);
                   $i++;
               }
            $VRicerca->showresult($l, $libri);
        }
        else $VRicerca->Login();
    }

    public function scambia()
    {
        $x=new FPersistentManager();
        $xx=$_POST['LibroPersonale'];
        $ll=$_POST['LibroRichiesto'];
        $t=explode('/',$xx);
        $tt=explode('/',$ll);
        unset($t[3]);
        unset($tt[3]);
        $y=$x->load('Cartaceo',$t);
        $yy=$x->load('Cartaceo',$tt);
        $p=new EProposta($y,$yy);
        $x->store($p);
        $v=new VCercaLibro();
        $v->showlibro($y,$yy);
    }
}
