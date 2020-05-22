<?php


class CCercaEbook
{
    public function ricerca()
    {

        $VRicerca=new VCercaEbook();
        $t=array();
        $t['titolo']=$VRicerca->gettitolo();
        $t['autore']=$VRicerca->getautore();
        $t['editore']=$VRicerca->geteditore();
        $t['genere']=$VRicerca->getgenere();
        $t['anno']=$VRicerca->getanno();
        //$t['prezzo_punti']=$VRicerca->getprezzo();
        $ordine='';
        $classe='Ebook';
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