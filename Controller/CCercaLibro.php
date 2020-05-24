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
      $libri=array();
      $VRicerca->showresult($x->search($classe,$y,$ordine),$libri);

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
     $v=new Smarty();
     $v->showlibro($y,$yy);
    }
}
