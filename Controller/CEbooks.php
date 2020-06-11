<?php


class CEbooks
{
    public function ricerca()
    {

        $VRicerca=new VCercaEbook();
        if(CUtente::isLogged()==true){
        $t=array();
        $t['titolo']=$VRicerca->gettitolo();
        $t['autore']=$VRicerca->getautore();
        $t['editore']=$VRicerca->geteditore();
        $t['genere']=$VRicerca->getgenere();
        $t['anno']=$VRicerca->getanno();
        $t['prezzo_punti']=$VRicerca->getprezzo();
        $ordine='';
        $classe='Ebook';
        $x=new FPersistentManager();
        $y=array();
        if($t['titolo']!= null || $t['autore']!= null || $t['editore']!= null || $t['genere']!= null || $t['anno']!= null || $t['prezzo_punti']!= null){
            foreach ($t as $k=>$v)
            {
                if($v!=NULL)
                    $y[$k]=$v;
            }
            $user=$x->load('Registrato',$_SESSION['user']);
            $VRicerca->showresult($x->search($classe,$y,$ordine),$user);}
        else
            $a=array();
            $user=$x->load('Registrato',$_SESSION['user']);
            $VRicerca->showresult($x->search('Ebook',$a,$ordine),$user);

        }
        else
            $VRicerca->Login();
    }

    public function compra($k,$kk)
    {
        if(CUtente::isLogged())
        {
            $o=new FPersistentManager();
            $x=$o->load('Registrato',$_SESSION['user']);
            $c['titolo']=$k;
            $c['autore']=$kk;
            $t=$o->load('Ebook',$c);
            $s['saldo']=0;
            $arr=array();
            $e=$o->search('Ebook',$arr,'');
            $v=new VCercaEbook();
            if($t->controllopunti($x)== true){
                $s['saldo']=$x->getsaldo()-$t->getprezzo();
                $o->update('Registrato',$s,$_SESSION['user']);
                $o->delete('Ebook',$c);
                $v->Compra($t,$x->getemail(),$s['saldo']);
            }
            else{
                $mess='Il tuo saldo punti  è insufficente';
                $v->saldoinsuff($x,$mess,$e);}


        }
    }

}