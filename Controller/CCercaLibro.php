<?php


class CercaLibro
{
    public function ricerca($p)
    {
      $VRicerca=new VCercaLibro();
        $t=array();
      $t['titolo']=$VRicerca->gettitolo();
      //$t['autore']=0;
      //$t['editore']=0;
      //$t['genere']=0;
      //$t['anno']=0;
      //$t['condizione']=0;
      $ordine='';
      $classe='Cartaceo';
      $x=new FPersistentManager();
      $y=array();
      foreach ($t as $k=>$v)
      {
          if($v!=NULL)
              $y[$k]=$v;
      }
      $result= $x->search($classe,$y,$ordine);
      $VRicerca->showResult($result);
    }
}
?>