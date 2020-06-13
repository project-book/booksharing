<?php

if(file_exists('config.inc.php')) require_once 'config.inc.php';

/**
 * Class FEbook
 */
class FEbook
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
    protected $tab = 'ebook';
    /**
     * @var array
     */
    protected $key = array('titolo','autore');
    /**
     * @var
     */
    protected $type;

    /**
     * FEbook constructor.
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
     * @param $o
     * Funzione che prepara lo statement SQL al fine di inserire l'oggetto nel database.
     */
    public function store($o)
    {
        $i=0;
        $values='';
        $fields='';
        $ob=$o->getobj();
        foreach($ob as $key=>$value) {
            if ($i == 0) {
                $fields .= $key;
                $values .= ':' . $key;
            } else {
                $fields .= ', ' . $key;
                $values .= ', :' . $key;
            }
            $i++;
        }

        $query = 'INSERT INTO ' .$this->tab . ' (' . $fields . ') VALUES (' . $values . ');';
        foreach ($ob as $key => $value)
            $return[':' . $key] = $value;
        $stmt = $this->connection->prepare($query);
        $stmt->execute($return);
    }

    /**
     * @param $chiave
     * @return EEbook
     * Ricerca in base alla chiave primaria la ennupla nel db e restituisce l'oggetto.
     */
    function load($chiave):EEbook
    {
        $i=0;
        $s='';
        foreach ($chiave as $key=>$value) {
            if (gettype($value) == 'string')
                $s .= $this->key[$i] . '=' .'\''.$value.'\''. ' AND ';
            else
                $s .= $this->key[$i] . '=' . $value . ' AND ';
            $i++;
        }
        $query = 'SELECT * ' .'FROM `' . $this->tab . '` ' . 'WHERE ' .$s;
        $query=substr($query,0,strlen($query)-4);
        $this->query($query);
        return $x = new EEbook($this->risultato[0]['titolo'], $this->risultato[0]['autore'], $this->risultato[0]['editore'],
            $this->risultato[0]['genere'], $this->risultato[0]['anno'],$this->risultato[0]['prezzo_punti']);
    }

    /**
     * @param $val
     * Elimina la ennupla nel db in base al valore della chiave primaria passata come parametro.
     */
    public function delete($val)
    {
        $s='';
        $i=0;
        foreach ($val as $key=>$value) {
            if (gettype($value) == 'string')
                $s .= $this->key[$i] . '=' .'\''.$value.'\''. ' AND ';
            else
                $s .= $this->key[$i] . '=' . $value . ' AND ';
            $i++;
        }
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$s;
        $query=substr($query,0,strlen($query)-4);
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
                if ($value == 'integer')
                    $fields .= $key . ' = ' . $value;
                else
                    $fields .= $key . '=' . '\'' . $value . '\'';
            }
            else {
                if ($value == 'integer')
                    $fields.=', '.$key.' = '.$value;
                else
                    $fields.=', '.$key.'='.'\''.$value.'\'';
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
        if(!empty($par)){
        $s='';
        foreach ($par as $key=>$value)
            if($key!='prezzo_punti'){
            if(gettype($value)=="integer")
                $s.=' '.$key.'='.$value.' AND';
            else
                $s.=' '.$key.'='.'\''.$value.'\''.'AND';}
        $s=substr($s,0,strlen($s)-3);
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$s;
        if(isset($par['prezzo_punti']))
            $query=$query.'AND'.' '.static::range($par['prezzo_punti']);

        if ($o!='')
            $query.='ORDER BY '.$o.' ';
        $this->query($query);
        $t=array();
        $n=count($this->risultato);
        for($i=0;$i<$n;$i++) {
            $p = new EEbook($this->risultato[$i]['titolo'], $this->risultato[$i]['autore'], $this->risultato[$i]['editore'], $this->risultato[$i]['genere'],(int)$this->risultato[$i]['anno'], (int)$this->risultato[$i]['prezzo_punti']);
            array_push($t, $p);
        }
        return $t;}
        else{
            $query='SELECT * ' . 'FROM `'.$this->tab.'`';
            $this->query($query);
            $t=array();
            $n=count($this->risultato);
            for($i=0;$i<$n;$i++) {
            $p = new EEbook($this->risultato[$i]['titolo'], $this->risultato[$i]['autore'], $this->risultato[$i]['editore'], $this->risultato[$i]['genere'],(int)$this->risultato[$i]['anno'], (int)$this->risultato[$i]['prezzo_punti']);
            array_push($t, $p);
            }
        return $t;}

    }

    /**
     * @param $x
     * @return string
     * Prepara l'interrogazione al db al fine di ricercare degli Ebook con prezzo compreso in un certo intervallo.
     */
    public function range($x)
    {
        $prezzo = explode('-', $x);
        $s = ' prezzo_punti BETWEEN ' . $prezzo[0] . ' AND ' . $prezzo[1];
        return $s;
    }
}