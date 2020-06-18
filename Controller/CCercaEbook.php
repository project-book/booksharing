<?php

require __DIR__."/../PHPMailer-master/";
/**
 * Class CEbooks
 * Controller che permette all'utente di ricercare e di acquistare un ebook.
 */
class CCercaEbook
{
    /**
     *Permette all'utente di ricercare un ebook nel db in base ai parametri passati dalla view.
     */
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

    /**
     * @param $k
     * @param $kk
     * Permette di acquistare l'ebook quindi verrà rimosso dal db e verrà aggiornato il saldo punti dell'utente.
     */
    public function compra($k, $kk)
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

                $mail = new PHPMailer();
                $mail->From     = "ebooks@booksharing.it";
                $mail->FromName = "booksharing.com";
                $mail->AddAddress($x->getemail());
                $mail->IsHTML(true);
                //$mail->AddBCC($indirizzibcc);
                $mail->Subject  =  'Oggetto: Invio libro versione pdf relativo acquisto sul nostro sito';
                $mail->Body     =  '';
                $mail->AltBody  =  "";
                $mail->AddAttachment(__DIR__.'/../Smarty-dir/assets/ebooks/ciao.pdf');
                if(!$mail->Send()){
                    $e=new VErrore();
                    $e->ErroreScambio('Errore nell\'invio del file controllare se la mail registrata è corretta e riprovare di nuovo');
                }else{
                    echo "SUCCESSO l'email è stata inviata!";
                }
            }
            else{
                $mess='Il tuo saldo punti  è insufficente';
                $v->saldoinsuff($x,$mess,$e);}


        }
    }

}