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
    }

    /**
     * @param $tit
     * @param $aut
     * Funzione che si occupa di eliminare o modificare un ebook dal db in base al valore del titolo e l'autore (chiavi primarie)
     * passati per parametro.
     */
    public function modifica_elimina($tit, $aut)
    {
        $v=new VAdmin();
        if($v->getmodfica()!= null){
            $v->modificaebook();
        }
        if($v->getelimina()!= null){
            $x=new FPersistentManager();
            if(CUtente::isLogged()==true){
                $u['titolo']=$tit;
                $u['autore']=$aut;
                $x->delete('Ebook',$u);
                header("Location:/booksharing/Admin/ricerca");
            }
        }
    }

    /**
     *Funzione che permette di aggiungere un ebook nel db.
     */
    public function aggiungiebook(){
        if(CUtente::isLogged()==true){
            $VRegistra=new VAdmin();
            $x=new FPersistentManager();
            $r= new EEbook($VRegistra->gettitolo(),$VRegistra->getautore(),$VRegistra->geteditore(),$VRegistra->getgenere(),$VRegistra->getanno(),$VRegistra->getprezzo());
            $x->store($r);
            header("Location:/booksharing/Admin/ricerca");
        }
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
            $t['ncivico']=$VRicerca->getncivico();
            $t['cap']=$VRicerca->getcap();
            $t['provincia']=$VRicerca->getprovincia();
            $t['comune']=$VRicerca->getcomune();
            $classe='Registrato';
            $x=new FPersistentManager();
            $y=array();

            if($t['user']!= null || $t['password']!= null || $t['nome']!= null || $t['cognome']!= null || $t['email']!= null || $t['via']!= null || $t['ncivico']!= null || $t['cap']!= null || $t['provincia']!= null || $t['comune']!= null){
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
            else
                $a=array();
                $eee=$x->search($classe,$a,'');
                foreach($eee as $u){
                    if($u->getuser()=='admin');
                        }
            $VRicerca->utenteresult($eee);

        }
    }

    /**
     * @param $user
     * Permette all'admin di bannare un utente e eliminare i sui dati dal db.
     */
    public function eliminautente($user){

        $x=new FPersistentManager();
        if(CUtente::isLogged()==true){
            $x->delete('Registrato',$user);
            $v=new VAdmin();
            $v->homeadmin();
        }
    }
}