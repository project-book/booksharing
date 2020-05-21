<?php


class CCercaLibro
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
      $t['condizione']=$VRicerca->getcondizione();
      $ordine='';
      $classe='Cartaceo';
      $x=new FPersistentManager();
      $y=array();
      foreach ($t as $k=>$v)
      {
          if($v!=NULL)
              $y[$k]=$v;
      }
      $libri=$x->search('Cartaceo',array(),$ordine);
      $VRicerca->showresult($x->search($classe,$y,$ordine),$libri);

    }
    public function scambia()
    {
     $x=new FPersistentManager();
     $xx=$_POST['LibroPersonale'];
     $ll=$_POST['LibroRichiesto'];
     $y=$x->load('Cartaceo',array($t,$a,$u));
     $v=new Smarty();
     $v->showlibro($y,$xx);
    }
}
