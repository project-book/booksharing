<?php

if(file_exists('config.inc.php')) require_once 'config.inc.php';

/**
 * Class FCartaceo
 */
class FCartaceo
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
    protected $tab = 'libro_cartaceo';
    /**
     * @var array
     */
    protected $key = array('titolo','autore','user');
    /**
     * @var
     */
    protected $type;


    /**
     * Connessione al db.
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
     * @param $query
     * Funzione che effettua la query al db e restituisce il risultato in un array.
     */
    public function query($query)
    {
        $stmt = $this->connection->query($query);
        $this->risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return string
     */
    public function gettab(): string
    {
        return $this->tab;
    }

    /**
     * @return array
     */
    public function getkey(): array
    {
        return $this->key;
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
                        if($x->getkey()==$key){
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
                        if ( $x->getkey()== $key)
                            $return[':' . $key] = $value;

            }

        $stmt = $this->connection->prepare($query);
        $stmt->execute($return);

    }

    /**
     * @param $chiave
     * @return ECartaceo
     * Ricerca in base alla chiave primaria la ennupla nel db e restituisce l'oggetto.
     */
    public function load($chiave):ECartaceo
    {
        $s='';
        $i=0;
        foreach ($chiave as $k=>$v) {
            $s .= $this->key[$i] . '=' .'\''.$v.'\'' . ' AND ';
            $i++;
        }
        $s=substr($s,0,strlen($s)-4);
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$s;
        $this->query($query);
        $i=new FRegistrato();
        $x=$i->load($this->risultato[0]['user']);
        $p = new ECartaceo($this->risultato[0]['titolo'],$this->risultato[0]['autore'],$this->risultato[0]['editore'],
            $this->risultato[0]['genere'],$this->risultato[0]['anno'],$this->risultato[0]['condizione'],$x,$this->risultato[0]['esaurito']);
        return $p;
    }

    /**
     * @param $val
     * Elimina la ennupla nel db in base al valore della chiave primaria passata come parametro.
     */
    public function delete($val)
    {
        $i=0;
        $s='';
        foreach ($val as $k=>$v) {
            $s .= $this->key[$i] . '=' .'\''.$v.'\'' . ' AND ';
            $i++;
        }
        $s=substr($s,0,strlen($s)-4);
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$s;
        print $query;
        return $this->query($query);
    }

    /**
     * @param array $parametri
     * @param array $chiave
     * Aggiorna la ennupla nel db, essa viene ricercata in base alla sua chiave primaria($chiave) e vengono modificati
     * i parametri specificati in $paramentri. $parametri è un array associativo dove la chiave è il nome della colonna nel db
     * e il valore è il valore che si vuole dare all'attributo della ennupla.
     */
    public function update($parametri = array(), $chiave = array())
    {
        $i=0;
        $fields='';

        foreach ($parametri as $key=>$value) {
            if($i==0) {
                if ($value == 'string')
                    $fields .= $key . '=' . '\'' . $value . '\'';
                else
                    $fields .= $key . ' = ' . $value;
            }
            else {
                if ($value == 'string')
                    $fields.=', '.$key.'='.'\''.$value.'\'';
                else
                    $fields.=', '.$key.' = '.$value;
            }
            $i++;
        }

        $s='';
        $i=0;
        foreach ($chiave as $key=>$value) {
            if (gettype($value) == 'string')
                $s .= $this->key[$i] . '=' .'\''.$value.'\''. ' AND ';
            else
                $s .= $this->key[$i] . '=' . $value . ' AND ';
            $i++;
        }
        $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$s;
        $query=substr($query,0,strlen($query)-4);
        $stmt=$this->connection->prepare($query);
        $stmt->execute();

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
            $l = new FRegistrato();
            $x = $l->load($this->risultato[$i]['user']);
            $p = new ECartaceo($this->risultato[$i]['titolo'], $this->risultato[$i]['autore'], $this->risultato[$i]['editore'], $this->risultato[$i]['genere'],
                (int)$this->risultato[$i]['anno'], $this->risultato[$i]['condizione'],$x,$this->risultato[$i]['esaurito']);
            array_push($t,$p);
        }
        return $t;}
        else{
        $query='SELECT * ' . 'FROM `'.$this->tab.'`';
        $this->query($query);
        $t=array();
        $n=count($this->risultato);
        for($i=0;$i<$n;$i++) {
            $l = new FRegistrato();
            $x = $l->load($this->risultato[$i]['user']);
            $p = new ECartaceo($this->risultato[$i]['titolo'], $this->risultato[$i]['autore'], $this->risultato[$i]['editore'], $this->risultato[$i]['genere'],
                (int)$this->risultato[$i]['anno'], $this->risultato[$i]['condizione'],$x);
            array_push($t,$p);
        }
        return $t;}

    }
}
