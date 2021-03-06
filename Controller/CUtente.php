<?php


/**
 * Class CUtente
 * Controller che si occupa di visualizzare e gestire le informazioni utente.
 */
class CUtente
{
    /**
     *Preleva i dati di registrazione e li salva nel db.
     * Effettua i controlli necessari e restituisce gli errori.
     */
    public function Salvadati()
    {
        $V = new VUtente();

        if ($V->getuser() == NULL OR $V->getvia() == NULL OR $V->getncivico() == NULL OR
            $V->getcap() == NULL OR $V->getcomune() == NULL OR $V->getpassword() == NULL OR
            $V->getnome() == NULL OR $V->getcognome() == NULL OR $V->getemail() == NULL
            OR $V->getprovincia() == NULL OR $V->getfile() == NULL) {
            $m = 'Devi riempire tutti i campi';
            static::registra($m);
            die;

        }
        else
        {
            $file = 'listacomuni.txt';
            $fr = fopen($file, 'r');
            $array = file($file);
            $X = Array();
            $b = false;
            foreach ($array as $rigo) {
                $X = explode(';', $rigo);
                if ($V->getcap() == $X[5] AND $V->getcomune() == $X[1] AND $V->getprovincia() == $X[2])
                    $b = true;
            }
            if ($b == false) {
                $m = 'il comune inserito non esiste';
                static::registra($m);
                exit;
            }

            $psw = "/[A-Za-z0-9]{3,15}/";
            $email = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
            $N = "/[0-9]{1,5}/";
            $v = "/[A-Za-z0-9'\.\-\s\,]{2,20}/";
            $cognome = "/[A-Za-z]{1,15}/";
            $nome = "/[A-Za-z]{1,15}/";


            $t[$nome] = $V->getnome();
            $t[$cognome] = $V->getcognome();
            $t[$email] = $V->getemail();
            $t[$psw] = $V->getpassword();
            $t[$N] = $V->getncivico();
            $t[$v] = $V->getvia();

            foreach ($t as $k => $value) {
                if (!preg_match($k, $value)) {
                    $m = 'Rispetta i formati';
                    static::registra($m);
                    die;
                }
            }

            $P = new FPersistentManager();
            //controlla che l'user esista gia nel database o che l'utente non scelga admin, il quale è l'unico che può accedere a informazioni protettte del sito.
            if ($P->load('Registrato', $V->getuser()) OR $V->getuser()=='admin') {
                $m = 'l\'user inserito è gia esistente';
                static::registra($m);
                exit;

            }

            $uploadDir = __DIR__.'/../Smarty-dir/assets/images/user/';
            foreach ($V->getfile() as $file) {
                if (UPLOAD_ERR_OK === $file['error']) {
                    $f=explode('/',$file['type']);

                    $fileName =$V->getuser().'.'.$f[1];
                    if (!preg_match('/^(jpeg|jpg|gif|png)$/', $f[1])) {
                        $m='Tipo non supportato';
                        static::registra($m);
                        exit;
                    }
                    else
                    {
                        if ($file['size']>200000) {
                            $m = 'File di dimensioni eccessive.';
                            $e = new VErrore();
                            $e->ERRORE($m);
                            exit;}
                            else
                                move_uploaded_file($file['tmp_name'], $uploadDir.DIRECTORY_SEPARATOR.$fileName);
                    }

                }
            }


            $i= new EIndirizzo($V->getvia(),$V->getncivico(),$V->getcap(),$V->getcomune(),$V->getprovincia());
            $r= new ERegistrato($V->getuser(),$V->getpassword(),$V->getnome(),$V->getcognome(),$V->getemail(),$i,0);
            $x=new FPersistentManager();
            $x->store($r);
            $V->inserimento('Registrazione completata, effettua il login');
        }
    }


    /**
     * @return bool
     * Verifica che le credenziali di accesso inserite esistano nel db.
     */
    public function verifica():bool
    {
        $t=array();
        $t['user']=$_POST['user'];
        $x=new FPersistentManager();
        if(!empty($x->search('Registrato',$t,''))) {
            $r = $x->load('Registrato', $_POST['user']);
            if ($r->getpsw() == $_POST['password'])
                $b= true;
            else
                $b= false;
        }
        else $b= false;
        return $b;
    }



    /**
     *Reindirizza alla pagina di login.
     */
    public function inserimento()
    {
        $v=new VUtente();
        $v->inserimento('');
    }



    /**
     *Permette all'utente di avviare la sessione.
     */
    public function login()
    {
        $v=new VUtente();
        $vv=new VAdmin();
        $p=new FPersistentManager();
        $x=$p->load('Registrato','admin');
            if (static::verifica() == true) {
                session_start();
                $_SESSION['user'] = $v->getuser();
                $_SESSION['password']=$v->getpassword();
                if($_SESSION['user']== 'admin') {
                    if ($_SESSION['password'] == $x->getpsw())
                        $vv->homeadmin($_SESSION['user'],'');
                }
                else
                    $v->home();
            } else
                $v->errore('');
    }

    /**
     *Permette all'utente di chiudere la sessione.
     */
    public function logout()
    {
        session_start();
        //elimina l'array $_SESSION
        session_unset();
        session_destroy();
       header('Location:/booksharing/');
    }


    /**
     * @param $m
     * Prepara la pagina di registrazione.
     */
    public function registra($m)
    {
        $V=new VUtente();
        $file = 'listacomuni.txt';
        $fr = fopen($file, 'r');
        $array = file($file);
        $X = Array();
        $ca=array();
        $comuni=array();
        $province=array();
        $ca[0]='';$comuni[0]='';$province[0]='';
        foreach ($array as $rigo)
        {
            $X = explode(';', $rigo);
            array_push($ca,$X[5]);
            array_push($comuni,$X[1]);
            array_push($province,$X[2]);
        }
        asort($ca);asort($province);
        $ca=array_unique($ca);$province=array_unique($province);

        $V->registra($m,$comuni,$province,$ca);
    }

//permette di visualizzare le info utente

    /**
     *Recupera le informazioni profilo utente dal db.
     */
    public function profilo()
    {

        $V=new VUtente();
        if(static::isLogged())
        {
            $x=new FPersistentManager();

            $a['valutato']=$_SESSION['user'];
            $aa['valutante']=$_SESSION['user'];
            $p['proponente']=$_SESSION['user'];
            $pp['ricevente']=$_SESSION['user'];
            $user['user']=$_SESSION['user'];
            $r=$x->load('Registrato',$_SESSION['user']);
            $libri=$x->search('Cartaceo',$user,'');
            $ll=array();
    foreach ($libri as $l)
       if($l->getstato()==0)
        array_push($ll,$l);

            $ric=$x->search('Valutazione',$a,'');

            $eff=$x->search('Valutazione',$aa,'');

            $propinv=$x->search('Proposta',$p,'');

            $propric=$x->search('Proposta',$pp,'');
            $proposta=array();
            if(!empty($propric))
            foreach($propric as $k=>$v)
               if($v->getstato()!=NULL)
                   $proposta=array_merge($propric);;
            if(!empty($propinv))
            foreach($propinv as $k=>$v)
                if($v->getstato()!=NULL)
                    $proposta=array_merge($propinv);;

                    //inserisci immagine
                    $directory=__DIR__."/../Smarty-dir/assets/images/user/";
            $immagine = glob($directory . $_SESSION['user'].'.{jpg,jpeg,png,gif}', GLOB_BRACE);
            shuffle($immagine);
            $Img=basename(array_pop($immagine));

                $V->profilo($ric,$eff,$r,$propinv,$propric,$ll,$proposta,$Img);

        }
        else $V->inserimento('Sessione scaduta');
    }


    /**
     * @return bool
     * verifica che l'utente abbia il cookie di sessione e riavvia la sessione.
     */
    public function isLogged()
    {
        $identificato = false;
        $n=new FPersistentManager();

        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                    }
                }
                if (isset($_SESSION['user'])) {
                    if($n->load('Registrato',$_SESSION['user'])) {
                       $x=$n->load('Registrato',$_SESSION['user']);
                        if($x->getpsw()==$_SESSION['password'])
                        $identificato = true;
                    }
                }
                return $identificato;
    }

    //

    /**
     * @param $prop
     * Permette di accettare o rifiutare una proposta e nel caso di accettazione si occupa di modificare opportunamente il db,
     * eliminando i libri.
     */
    public function Risposta($prop)
    {
        if(static::isLogged()){
        $n = new FPersistentManager();
        $x = new VUtente();

        if ($x->getida() != NULL) {
            $e = $x->getida();
            $a['stato'] = "Accettato";
            $n->update('Proposta', $a, $e);
            $p=$n->load('Proposta',$e);
            $t['titolo']=$p->getlibroprop()->getTitolo();
            $t['autore']=$p->getlibroprop()->getAutore();
            $t['user']=$p->getlibroprop()->getUser()->getuser();
            $tt['titolo']=$p->getlibrorich()->getTitolo();
            $tt['autore']=$p->getlibrorich()->getAutore();
            $tt['user']=$p->getlibrorich()->getUser()->getuser();
            $xx['esaurito']=1;
            $xxx['esaurito']=1;
            $n->update('Cartaceo',$xx,$t);
            $n->update('Cartaceo',$xxx,$tt);
            $pr=$n->load('Proposta',$prop);
            $reg1=$n->load('Registrato',$t['user']);
            $reg2=$n->load('Registrato',$tt['user']);
            $s1['saldo']=$reg1->getsaldo()+10;
            $s2['saldo']=$reg2->getsaldo()+10;


            $n->update('Registrato',$s1,$t['user']);
            $n->update('Registrato',$s2,$tt['user']);
            $x->scambioconfermato($pr);
        }
        if ($x->getidr() != NULL) {
            $e = $x->getidr();
            $a['stato'] = "Rifiutato";
            $n->update('Proposta', $a, $e);
            header(('Location:/booksharing/Utente/profilo'));
        }}
        else {
                 $v = new VUtente();
                 $v->inserimento('Sessione scaduta');
              }
    }



    /**
     * @param $id
     * Indirizza alla pagina che permette la scrittura della recensione.
     */
    public function Recensione($id,$m){
        if(static::isLogged()){
        $v=new VUtente();
        $u=$v->getrecensione();
        $v->recensione($u,$id,$m);}
        else {$v=new VUtente();
        $v->inserimento('Sessione scaduta');}
    }


    /**
     *Permette di modificare le informazioni utente nel db.
     */
    public function aggiornautente(){

        if(static::isLogged()) {
                $VRicerca = new VUtente();
                if($VRicerca->getcap()!=NULL AND $VRicerca->getcomune()!=NULL AND $VRicerca->getprovincia()!=NULL) {
                    $file = 'listacomuni.txt';
                    $fr = fopen($file, 'r');
                    $array = file($file);
                    $X = Array();
                    $b = false;
                    foreach ($array as $rigo) {
                        $X = explode(';', $rigo);
                        if ($VRicerca->getcap() == $X[5] AND $VRicerca->getcomune() == $X[1] AND $VRicerca->getprovincia() == $X[2])
                            $b = true;
                    }
                    if ($b == false) {
                        $m = 'il comune inserito non esiste';
                        static::modificautente($m);
                        exit;
                    }

                }
                else {
                    if ($VRicerca->getcap() != NULL OR $VRicerca->getcomune() != NULL OR $VRicerca->getprovincia() != NULL) {
                        $m = 'Devi modificare tutti i campi relativi a comune,provincia e cap.';
                        static::modificautente($m);
                        exit;
                    }
                }

            $psw = "/[A-Za-z0-9]{3,15}/";
            $email = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
            $N = "/[0-9]{1,5}/";
            $v = "/[A-Za-z0-9'\.\-\s\,]{2,20}/";

            $t = array();
            $t[$email] = $VRicerca->getemail();
            $t[$psw] = $VRicerca->getpassword();
            $t[$N] = $VRicerca->getncivico();
            $t[$v] = $VRicerca->getvia();
            foreach ($t as $k => $value) {
                if (!preg_match($k, $value) and $value != NULL) {
                    $m = 'Rispetta i formati';
                    $p = new FPersistentManager();
                    $u = $p->load('Registrato', $_SESSION['user']);
                    static::modificautente($m);
                } else {
                    $a['user'] = $VRicerca->getuser();
                    $a['password'] = $VRicerca->getpassword();
                    $a['nome'] = $VRicerca->getnome();
                    $a['cognome'] = $VRicerca->getcognome();
                    $a['email'] = $VRicerca->getemail();
                    $x = new FPersistentManager();
                    $y = array();
                    foreach ($a as $k => $v) {
                        if ($v != NULL)
                            $y[$k] = $v;
                    }
                    $x->update('Registrato', $y, $_SESSION['user']);
                    $tt = array();
                    $tt['via'] = $VRicerca->getvia();
                    $tt['civico'] = $VRicerca->getncivico();
                    $tt['cap'] = $VRicerca->getcap();
                    $tt['comune'] = $VRicerca->getcomune();
                    $tt['provincia'] = $VRicerca->getprovincia();
                    $ttt = array();
                    $u = $x->load('Registrato', $_SESSION['user']);
                    array_push($ttt, $u->getindirizzo()->getVia(), $u->getindirizzo()->getNcivico(), $u->getindirizzo()->getcap());
                    $yy = array();
                    foreach ($tt as $k => $v) {
                        if ($v != NULL)
                            $yy[$k] = $v;
                    }
                    $x->update('Indirizzo', $yy, $ttt);


                    $directory = __DIR__ . '/../Smarty-dir/assets/images/user/';

                    $immagine = glob($directory . $_SESSION['user'] . '.{jpg,jpeg,png,gif}', GLOB_BRACE);
                    shuffle($immagine);
                    $Img = basename(array_pop($immagine));

                    foreach ($VRicerca->getfile() as $file) {
                        if (UPLOAD_ERR_OK === $file['error']) {
                            $f = explode('/', $file['type']);

                            $fileName = $_SESSION['user'] . '.' . $f[1];
                            if (!preg_match('/^(jpeg|jpg|gif|png)$/', $f[1])) {
                                $m = 'Tipo non supportato';
                                static::modificautente($m);
                                exit;
                            } else {
                                if ($file['size'] > 3000000) {
                                    $m = 'File di dimensioni eccessive.';
                                    $e = new VErrore();
                                    $e->ERRORE($m);
                                    exit;
                                }
                                if (isset($immagine[0])) {
                                    unlink(realpath($directory) . '/' . $Img);
                                }
                                move_uploaded_file($file['tmp_name'], $directory . DIRECTORY_SEPARATOR . $fileName);
                            }
                        }

                    }



                }
            }
                  static::profilo();
                  exit;
        }else {$v=new VUtente();
        $v->inserimento('Sessione scaduta');}
    }
    /**
     *Elimina l'account definitivamente.
     */
public function EliminaAccount()
{
    if(static::isLogged()){
        $directory = __DIR__ . '/../Smarty-dir/assets/images/user/';
        $immagine = glob($directory . $_SESSION['user']. '.{jpg,jpeg,png,gif}', GLOB_BRACE);
        shuffle($immagine);
        $Img = basename(array_pop($immagine));
        $p=new FPersistentManager();
        $p->delete('Registrato',$_SESSION['user']);
        unlink(realpath($directory) . '/' . $Img);
        header('Location:/booksharing/');
    }
    else {
        $v = new VUtente();
        $v->inserimento('Sessione scaduta');
    }
}

    /**
     *Prepara la pagina che permette di modificare le informazioni utente.
     */
    public function modificautente($m){
        $V=new VUtente();

        if(static::isLogged()){
            $x = new FPersistentManager();
            $u=$x->load('Registrato',$_SESSION['user']);
            $file = 'listacomuni.txt';
            $fr = fopen($file, 'r');
            $array = file($file);
            $X = Array();
            $ca=array();
            $comuni=array();
            $province=array();
            $ca[0]='';$comuni[0]='';$province[0]='';
            foreach ($array as $rigo)
            {
                $X = explode(';', $rigo);
                array_push($ca,$X[5]);
                array_push($comuni,$X[1]);
                array_push($province,$X[2]);
            }
            asort($ca);asort($province);
            $ca=array_unique($ca);$province=array_unique($province);
            $V->modificautente($u,$m,$ca,$province,$comuni);
        }
        else {
            $v=new VUtente();
            $v->inserimento('Sessione scaduta');
        }

    }

    /**
     * @param $user
     * Permette di visualizzare le informazioni di un utente dopo aver cliccato una stringa referenziata sulla pagina html.
     */
    public function dettagliutente($user){
        $v = new VUtente();
        if(static::isLogged()) {
         $b=false;
            $x = new FPersistentManager();
            $u = $x->load('Registrato', $user);
            if(!empty($x->search('Proposta',array('proponente'=>$user,'stato'=>'Accettato'),'')) OR
                !empty($x->search('Proposta',array('proponente'=>$user,'stato'=>'Recensito'),'')) OR
                    !empty($x->search('Proposta',array('ricevente'=>$user,'stato'=>'Accettato'),''))OR
                        !empty($x->search('Proposta',array('ricevente'=>$user,'stato'=>'Recensito'),'')))
                $b=true;

            $xx['user'] = $user;
            $xxx['valutato'] = $user;
            $l = $x->search('Cartaceo', $xx, '');
            $val = $x->search('Valutazione', $xxx, '');
            $directory = __DIR__ . "/../Smarty-dir/assets/images/user/";
            $immagine = glob($directory . $user . '.{jpg,jpeg,png,gif}', GLOB_BRACE);
            shuffle($immagine);
            $Img = basename(array_pop($immagine));
            $v->dettagliutente($u, $l, $val, $Img,$b);
        }
        else
            $v->inserimento('Sessione scaduta');

    }



    /**
     * @param $u
     * @param $id
     * Salva nel db la recensione scritta.
     */
    public function inviarec($u, $id){
        $m='';
        $v=new VUtente();
        $o=new FPersistentManager();
        if(static::isLogged()){
            $valte=$o->load('Registrato',$_SESSION['user']);
            $valto=$o->load('Registrato',$u);
if($v->getcommento()!=NULL AND preg_match("/[1-5]{1}/",$v->getvoto())) {
    $x = new EValutazione($v->getcommento(), $v->getvoto(), $valte, $valto);
    $o->store($x);
    $prop = $o->load('Proposta', $id);

    if ($prop->getstato() == 'Accettato')
        $arr['stato'] = $_SESSION['user'];
    if ($prop->getstato() == $u)
        $arr['stato'] = 'Recensito';

    $o->update('Proposta', $arr, $id);

    //$v->recensione($u,$id,$m);
    header(('Location:/booksharing/Utente/profilo'));
}else {
    $m ='Devi riempire tutti i campi';
        $v->recensione($u, $id, $m);
    }
            }else $v->inserimento('Sessione scaduta');
}

    /**
     *Permette di aggiungere un libro alla propria lista dei libri da scambiare, quindi lo aggiunge al db.
     */
    public function aggiungilibro()
    {
        if (CUtente::isLogged() == true) {
            $VRegistra = new VCercaLibro();
            $v = new VUtente();
            $x = new FPersistentManager();
            $anno = (int)$VRegistra->getanno();
            $t = array('Giallo', 'Horror', 'Storico', 'Biografia', 'Narrativa', 'Fantasy', 'Thriller', 'Romanzo');
            $tt = array('Nuovo', 'Ottime', 'Pessime', 'Buone');
            $bool = 0;
            $booltt = 0;


            $titolo = "/[0-9A-Za-z]{1,30}/";
            $autore = "/[0-9A-Z]{1,30}/";
            $editore = "/[0-9A-Za-z]{1,30}/";
            $anno="/[0-9]{1,4}/";


            if((!preg_match($titolo,$VRegistra->gettitolo()) AND $VRegistra->gettitolo()!=nulL) OR
                (!preg_match($autore,$VRegistra->getautore()) AND $VRegistra->getautore()!=nulL)
                OR (!preg_match($editore,$VRegistra->geteditore()) AND $VRegistra->geteditore()!=nulL)
                OR (!preg_match($anno,$VRegistra->getanno()) AND $VRegistra->getanno()!=nulL) ){
                $e=new VErrore();
                $e->ERRORE('Rispettare i formati richiesti');
            } else {
            foreach ($t as $k) {
                if ($VRegistra->getgenere() == $k) $bool = 1;
            }


            foreach ($tt as $k) {
                if ($VRegistra->getcondizione() == $k) $booltt = 1;
            }

            if ($booltt == 1 and $bool == 1) {

                $reg = $x->load('Registrato', $_SESSION['user']);
                $r = new ECartaceo($VRegistra->gettitolo(), $VRegistra->getautore(), $VRegistra->geteditore(), $VRegistra->getgenere(), $anno, $VRegistra->getcondizione(), $reg, 0);
                $x->store($r);
                $uploadDir = __DIR__ . '/uploads/libri';

                foreach ($v->getfile() as $file) {
                    if (UPLOAD_ERR_OK === $file['error']) {
                        $f = explode('/', $file['type']);

                        $fileName = $VRegistra->gettitolo() . '_' . $VRegistra->getautore() . '_' . $_SESSION['user'] . '_' . '.' . $f[1];
                        move_uploaded_file($file['tmp_name'], $uploadDir . DIRECTORY_SEPARATOR . $fileName);
                    }
                }

                header("Location:/booksharing/Utente/profilo");
            } else
                header("Location:/booksharing/Utente/profilo");

    }}
    else
        {
            $v = new VUtente();
            $v->inserimento('Sessione scaduta');
        }

    }



    /**
     * @param $tit
     * @param $aut
     * Elimina il libro della propria lista dei libri da scambiare dal db.
     */
    public function eliminalibro($tit, $aut){

        if(static::isLogged())
        {
        $t=explode('%20',$tit);
        $a=explode('%20',$aut);
        foreach ($t as $item)
        {
            if($item==$t[0])
            $s=$item;
            else
                $s.=' '.$item;
        }
        foreach ($a as $item)
        {
            if($item==$a[0])
                $ss=$item;
            else
                $ss.=' '.$item;
        }

        $x=new FPersistentManager();
        if(CUtente::isLogged()==true){
            $u['titolo']=$s;
            $u['autore']=$ss;
            $u['user']=$_SESSION['user'];
            $x->delete('Cartaceo',$u);
            header("Location:/booksharing/Utente/profilo");
        }
    }
    else{ $v=new VUtente();
    $v->inserimento('Sessione scaduta');}}



    /**
     * @param $tit
     * @param $a
     * @param $u
     * Propone uno scambio ad un user.
     */
    public function proponiscambio($tit, $a, $u){
        $VRicerca = new VCercaLibro();
        if(CUtente::isLogged()==true) {
            $t = array();
            $t['titolo'] = $tit;
            $t['autore'] = $a;
            $t['user']=$u;
            $o=new FPersistentManager();
            $l=$o->search('Cartaceo',$t,'');
            $to['user']=$_SESSION['user'];
            $ll=$o->search('Cartaceo',$to,'');
            foreach ($l as $k)
            {
                $x=$k->getUser()->getuser();
                $user['valutato']=$x;
                $u=new FPersistentManager();
                $uu=$u->search('Valutazione',$user,'');
                $c=array();
                foreach ($uu as $i)
                    array_push($c,$i->getVoto());

                $r=$u->load('Registrato',$x);
                $tt[$x]=$r->calcolamedia($c);
            }
            $i=0;
            foreach ($l as $k)
            {
                if($k->getUser()->getuser()==$_SESSION['user'])
                    unset($l[$i]);
                $i++;
            }
            $VRicerca->showResult($l,$ll,$tt);
        }
        else
        {
            $v=new VUtente();
            $v->inserimento('Sessione scaduta');
        }

}}
