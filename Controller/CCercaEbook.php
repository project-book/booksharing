<?php


class CCercaEbook
{
    public function ricerca()
    {

        $VRicerca=new VCercaLibro();
        $t=array();
        $t['titolo']=$VRicerca->gettitolo();
        $t['autore']=$VRicerca->getautore();
        $t['editore']=$VRicerca->geteditore();
        $t['genere']=$VRicerca->getgenere();
        $t['anno']=$VRicerca->getanno();
        $t['condizione']=$VRicerca->getprezzo();
        $ordine='';
        $classe='Cartaceo';
        $x=new FPersistentManager();
        $y=array();
        foreach ($t as $k=>$v)
        {
            if($v!=NULL)
                $y[$k]=$v;
        }
        $VRicerca->showresult($x->search($classe,$y,$ordine));
    }
}