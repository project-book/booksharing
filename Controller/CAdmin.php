<?php


/**
 * Class CAdmin
 * Controller che permette la gestione degli ebook e degli utenti da parte dell'admin.
 */
class CAdmin
{
    /**
     *Funzione che si occupa di ricercare gli ebook nel db in base ai valori prelevati dalla view.
     */
    public function ricerca()
    {

        $VRicerca=new VAdmin();
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
                $VRicerca->ebookresult($x->search($classe,$y,$ordine),$user);}
            else
                $a=array();
            $user=$x->load('Registrato',$_SESSION['user']);
            $VRicerca->ebookresult($x->search('Ebook',$a,$ordine),$user);

        }
        else {$v=new VUtente();
            $v->inserimento('Sessione scaduta');}
    }

    /**
     * @param $tit
     * @param $aut
     * Funzione che si occupa di eliminare o modificare un ebook dal db in base al valore del titolo e l'autore (chiavi primarie)
     * passati per parametro.
     */
    public function modifica_elimina($ti,$a)
    {if(CUtente::isLogged()==true){
        $k='';$j='';
        $kk='';$jj='';
        $tit=explode('%20',$ti);
        $aut=explode('%20',$a);
        if(count($tit)==1)
            $k=$tit[0];
        else
            foreach($tit as $item)
            {
                $k.=$item.'_';
            }


        if(count($aut)==1)
            $kk=$aut[0];
        else
            foreach($aut as $item)
            {
                $kk.=$item.'_';
            }

        if(count($tit)==1)
            $j=$tit[0];
        else
            foreach($tit as $item)
            {
                $j.=$item.' ';
            }


        if(count($aut)==1)
            $jj=$aut[0];
        else
            foreach($aut as $item)
            {
                $jj.=$item.' ';
            }

        $kk=substr($kk,0,strlen($kk)-1);
        $k=substr($k,0,strlen($k)-1);
        $jj=substr($jj,0,strlen($jj)-1);
        $j=substr($j,0,strlen($j)-1);

        $directory = __DIR__ . '/../Smarty-dir/assets/ebooks/';
        $immagine = glob($directory . $k.'_'.$kk . '.pdf', GLOB_BRACE);
        shuffle($immagine);
        $Img = basename(array_pop($immagine));

        $v=new VAdmin();
        $p=new FPersistentManager();
        $t['titolo']=$j;
        $t['autore']=$jj;
        if($v->getmodfica()!= null){
        $ebook=$p->load('Ebook',$t);
            $v->modificaebook($ebook);
        }
        if($v->getelimina()!= null){
            $x=new FPersistentManager();
                print (realpath($directory));
                print $Img;
                $x->delete('Ebook',$t);
                unlink(realpath($directory) . '/' . $Img);
                header("Location:/booksharing/Admin/ricerca");
            }
        }else{$v=new VUtente();
        $v->inserimento('Sessione scaduta');}
    }

    /**
     *Funzione che permette di aggiungere un ebook nel db.
     */
    public function aggiungiebook()
    {
        if (CUtente::isLogged() == true) {
            $VRegistra = new VAdmin();
            $x = new FPersistentManager();
            $s='';$ss='';

         $uploadDir = __DIR__ . '/../Smarty-dir/assets/ebooks';
            foreach ($VRegistra->getfile() as $file) {
                if (UPLOAD_ERR_OK === $file['error']) {
                    $f = explode('/', $file['type']);
                    print_r($t=explode(' ',$VRegistra->gettitolo()));
                    $a=explode(' ',$VRegistra->getautore());
                    foreach ($t as $item)
                    {
                        if($item==$t[0])
                            $s=$item;
                        else
                            $s.='_'.$item;
                    }
                    foreach ($a as $item)
                    {
                        if($item==$a[0])
                            $ss=$item;
                        else
                            $ss.='_'.$item;
                    }
                    //substr($s,0,strlen($s)-1);
                    //substr($ss,0,strlen($ss)-1);



                    $fileName = $s . '_' . $ss . '.' . $f[1];
                    if (!preg_match('/^(pdf)$/', $f[1])) {
                        $m = 'IL formato deve essere PDF.';
                        $e = new VErrore();
                        $e->ERRORE($m);
                        exit;
                    } else {
                        if ($file['size']>200000) {
                            $m = 'File di dimensioni eccessive.';
                            $e = new VErrore();
                            $e->ERRORE($m);
                            exit;
                        } else {
                            print $uploadDir . DIRECTORY_SEPARATOR . $fileName;
                            move_uploaded_file($file['tmp_name'], $uploadDir . DIRECTORY_SEPARATOR . $fileName);
                            $r = new EEbook($VRegistra->gettitolo(), $VRegistra->getautore(), $VRegistra->geteditore(), $VRegistra->getgenere(), $VRegistra->getanno(), $VRegistra->getprezzo());
                            $x->store($r);
                            header("Location:/booksharing/Admin/ricerca");
                        }
                    }
                }
                else
                {
                    $m = 'Caricamento interrotto.';
                    $e = new VErrore();
                    $e->ERRORE($m);
                    exit;
                }


            }
            }

        else
        {$v=new VUtente();
            $v->inserimento('Sessione scaduta');}
    }

    /**
     *Funzione che permette all'admin di ricercare un utente dal db in base ai parametri di ricerca prelevati dalla view.
     */
    public function ricercautente()
    {
        $VRicerca=new VAdmin();
        if(CUtente::isLogged()==true){
            $t=array();
            $t['user']=$VRicerca->getuser();
            $t['password']=$VRicerca->getpassword();
            $t['nome']=$VRicerca->getnome();
            $t['cognome']=$VRicerca->getcognome();
            $t['email']=$VRicerca->getemail();
            $t['via']=$VRicerca->getvia();
            $t['civico']=$VRicerca->getncivico();
            $t['cap']=$VRicerca->getcap();
            $classe='Registrato';
            $x=new FPersistentManager();
            $y=array();
            $r=array();
            if($t['user']!= null || $t['password']!= null || $t['nome']!= null || $t['cognome']!= null || $t['email']!= null || $t['via']!= null || $t['civico']!= null || $t['cap']!= null){
                foreach ($t as $k=>$v)
                {
                    if($v!=NULL)
                        $y[$k]=$v;
                }
                $ee=$x->search($classe,$y,'');
                foreach($ee as $u){
                    if($u->getuser()=='admin');
                        unset($u);}
                $VRicerca->utenteresult($ee);}
            else {
                $a = array();
                $eee = $x->search($classe, $a, '');
                foreach ($eee as $u) {
                    if ($u->getuser() == 'admin') ;
                }
                $VRicerca->utenteresult($eee);
            }

        }else {$v=new VUtente();
            $v->inserimento('Sessione scaduta');}
    }

    /**
     * @param $user
     * Permette all'admin di bannare un utente e eliminare i sui dati dal db.
     */
    public function eliminautente($user){
        $directory = __DIR__ . '/../Smarty-dir/assets/images/user/';
        $immagine = glob($directory . $user. '.{jpg,jpeg,png,gif}', GLOB_BRACE);
        shuffle($immagine);
        $Img = basename(array_pop($immagine));

        $x=new FPersistentManager();
        if(CUtente::isLogged()==true){
            $x->delete('Registrato',$user);
            unlink(realpath($directory) . '/' . $Img);
            $v=new VAdmin();
            $m='L\'utente è stato eliminato';
            $v->homeadmin($_SESSION['user'],$m);
        }else {$v=new VUtente();
            $v->inserimento('Sessione scaduta');}
    }

    public function aggiornaebook($ti,$a){
        $p=new FPersistentManager();
        $v=new VAdmin();
        $k='';$kk='';
        if(CUtente::isLogged()==true){
        if($v->geteditore()!=NULL)
        $t['editore']=$v->geteditore();
        if($v->getgenere()!=NULL)
        $t['genere']=$v->getgenere();
        if($v->getanno()!=NULL)
        $t['anno']=$v->getanno();
        if($v->getprezzo()!=NULL)
        $t['prezzo_punti']=$v->getprezzo();
            $tit=explode('%20',$ti);
            $aut=explode('%20',$a);
            if(count($tit)==1)
                $k=$tit[0];
            else
                foreach($tit as $item)
                {
                    $k.=$item.' ';
                }


            if(count($aut)==1)
                $kk=$aut[0];
            else
                foreach($aut as $item)
                {
                    $kk.=$item.' ';
                }
            $kk=substr($kk,0,strlen($kk)-1);
            $k=substr($k,0,strlen($k)-1);
            $u['titolo']=$k;
            $u['autore']=$kk;
        $p->update('Ebook',$t,$u);
        $m='la modifica è andata buon fine';
            $file = 'listacomuni.txt';
            $fr = fopen($file, 'r');
            $array = file($file);
            $X = Array();
            $ca=array();
            $ca[0]='';
            foreach ($array as $rigo)
            {
                $X = explode(';', $rigo);
                array_push($ca,$X[5]);
            }
            asort($ca);
            $ca=array_unique($ca);

        $v->homeadmin($_SESSION['user'],$m,$ca);}
else
{$v=new VUtente();
$v->inserimento('Sessione scaduta');}
    }
}