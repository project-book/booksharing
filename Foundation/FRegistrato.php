<?php

if(file_exists('config.inc.php')) require_once 'config.inc.php';

/**
 * Class FRegistrato
 */
class FRegistrato
{
    /**
     * @var PDO
     */
    protected $connection;
    /**
     * @var
     */
    protected $risultato;
    /**
     * @var string
     */
    protected $tab = 'registrato';
    /**
     * @var string
     */
    protected $key = 'user';
    /**
     * @var
     */
    protected $type;

    /**
     * FRegistrato constructor.
     */
    public function __construct()
    {
        try {

            $this->connection = new PDO ("mysql:dbname=".$GLOBALS['database'].";host=localhost; charset=utf8;", $GLOBALS['username'], $GLOBALS['password']);

        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            die;
        }
    }

    /**
     * @return string
     */
    public function getkey()
    {
        return $this->key;
    }

    /**
     * @return array
     */
    public function getris():array
    {
        return $this->risultato;
    }

    /**
     * @param $query
     * Funzione che effettua la query al db e restituisce il risultato in un array.
     */
    public function query($query)
    {
        $stmt = $this->connection->query($query);
        $this->risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $objec
     * Funzione che prepara lo statement SQL al fine di inserire l'oggetto nel database.
     */
    public function store($objec)
    {
        $o=$objec->getobj();
        $i = 0;
        $values = '';
        $fields = '';
        foreach ($o as $key => $value)
            if (!is_object($value) AND !is_array($value))
            {
                {
                    if ($i == 0) {
                        $fields .= $key;
                        $values .= ':' . $key;
                    } else {
                        $fields .= ', ' . $key;
                        $values .= ', :' . $key;
                    }
                    $i++;
                }
            }
            else if (is_object($value))
            {
                $oo=$value->getobj();
                $x=get_class($value);
                $x=substr($x,1,strlen($x));
                $x=singleton::getInstance('F'.$x);
                $x->store($value);
                foreach ($oo as $key => $value)
                {
                    foreach($x->getkey() as $r)
                        if($r==$key){
                            if ($i == 0) {
                                $fields .= $key;
                                $values .= ':' . $key;
                            } else {
                                $fields .= ', ' . $key;
                                $values .= ', :' . $key;
                            }
                            $i++;
                        }}

            }
        $query = 'INSERT INTO ' .$this->tab . ' (' . $fields . ') VALUES (' . $values . ');';

        foreach ($o as $key => $value)
            if (!is_object($value) AND !is_array($value))
                $return[':' . $key] = $value;
            else if (is_object($value)) {
                $oo = $value->getobj();
                $x = get_class($value);
                $x = substr($x, 1, strlen($x));
                $x = singleton::getInstance('F' . $x);
                foreach ($oo as $key => $value)
                    foreach ($x->getkey() as $r)
                        if ($r == $key)
                            $return[':' . $key] = $value;

            }
        $stmt = $this->connection->prepare($query);
        $stmt->execute($return);
    }

    /**
     * @param $val
     * Elimina la ennupla nel db in base al valore della chiave primaria passata come parametro.
     */
    public function delete($val)
    {
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$this->key.'='.'\''.$val.'\'';
        return $this->query($query);
    }

    /**
     * @param array $parametri
     * @param $chiave
     * Aggiorna la ennupla nel db, essa viene ricercata in base alla sua chiave primaria($chiave) e vengono modificati
     * i parametri specificati in $paramentri. $parametri è un array associativo dove la chiave è il nome della colonna nel db
     * e il valore è il valore che si vuole dare all'attributo della ennupla.
     */
    public function update($parametri = array(), $chiave)
    {
        $n=0;
        $fields='';
        $i=new FIndirizzo();
        $r=New FRegistrato();
        $o=$r->load($chiave);

        foreach ($parametri as $key=>$value) {
            if ($key == 'cap' OR $key == 'civico' OR $key == 'via')
            {
             $p[$key]=$value;
            }
            else
            {
                if ($n == 0) {
                    if (gettype($value) == 'string')
                        $fields .= $key . '=' . '\'' . $value . '\'';
                    else
                        $fields .= $key . ' = ' . $value;
                } else {
                    if (gettype($value )== 'string')
                        $fields .= ', ' . $key . '=' . '\'' . $value . '\'';
                    else
                        $fields .= ', ' . $key . ' = ' . $value;
                }
                $i++;
            }
        }

        $k['via']=$o->getindirizzo()->getVia();
        $k['ncivico']=$o->getindirizzo()->getNcivico();
        $k['cap']=$o->getindirizzo()->getcap();

        if(!empty($p) AND !empty($k))
        $i->update($p,$k);

        if(gettype($chiave)=="integer")
            $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$this->key.'='.$chiave;
        if(gettype($chiave)=="string")
            $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$this->key.'='.'\''.$chiave.'\'';
        $stmt=$this->connection->prepare($query);
        $stmt->execute();
    }

    /**
     * @param $chiave
     * @return ERegistrato|null
     * Ricerca in base alla chiave primaria la ennupla nel db e restituisce l'oggetto.
     */
    public function load($chiave)
    {
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$this->key.'='.'\''.$chiave.'\'';
        $this->query($query);
          $i=new FIndirizzo();
          if(!empty($this->risultato)) {
              $x = $i->load(array($this->risultato[0]['via'], $this->risultato[0]['civico'], $this->risultato[0]['cap']));
              $p = new ERegistrato($this->risultato[0]['user'], $this->risultato[0]['password'], $this->risultato[0]['nome'],
                  $this->risultato[0]['cognome'], $this->risultato[0]['email'], $x, $this->risultato[0]['saldo']);
              return $p;
          } else return NULL;

    }

    /**
     * @param $par
     * @param $o
     * @return array
     * Ricerca una ennupla nel db in base a $par.  $par è un array associativo dove la chiave è il nome della colonna nel db
     * e il valore è il valore dell'attributo in base al quale stiamo effettuando l'interrogazione.
     */
    public function search($par, $o):array
    {
            $s='';
        if(!empty($par)){
            foreach ($par as $key=>$value)
                if(gettype($value)=="integer")
                    $s.=' '.$key.'='.$value.' AND';
                else
                    $s.=' '.$key.'='.'\''.$value.'\''.'AND';
            $s=substr($s,0,strlen($s)-3);
            $query='SELECT * ' .
                'FROM `'.$this->tab.'` '.'WHERE '.$s.' ';
            if ($o!='')
                $query.='ORDER BY '.$o.' ';
            $this->query($query);
            $t=array();
            $n=count($this->risultato);
            for($i=0;$i<$n;$i++) {
                $l = new FIndirizzo();
                $x = $l->load(array($this->risultato[$i]['via'], $this->risultato[$i]['civico'], (int)$this->risultato[$i]['cap']));
                $p = new ERegistrato($this->risultato[$i]['user'], $this->risultato[$i]['password'], $this->risultato[$i]['nome'], $this->risultato[$i]['cognome'], $this->risultato[$i]['email'], $x, $this->risultato[$i]['saldo']);

                array_push($t,$p);
            }
            return $t;}
        else
        {

            $query='SELECT * ' .
                'FROM `'.$this->tab;
            if ($o!='')
                $query.='ORDER BY '.$o.' ';
            $this->query($query);
            $t=array();
            $n=count($this->risultato);
            for($i=0;$i<$n;$i++) {
                $l = new FIndirizzo();
                $x = $l->load(array($this->risultato[$i]['via'], $this->risultato[$i]['civico'], (int)$this->risultato[$i]['cap']));
                $p = new ERegistrato($this->risultato[$i]['user'], $this->risultato[$i]['password'], $this->risultato[$i]['nome'], $this->risultato[$i]['cognome'], $this->risultato[$i]['email'], $x, $this->risultato[$i]['saldo']);

                array_push($t,$p);
            }
            return $t;
        }
    }

}
