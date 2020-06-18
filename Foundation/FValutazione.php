<?php

if(file_exists('config.inc.php')) require_once 'config.inc.php';

/**
 * Class FValutazione
 */
class FValutazione
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
    protected $tab = 'valutazione';
    /**
     * @var string
     */
    protected $key = 'id';
    /**
     * @var
     */
    protected $type;

    /**
     * FValutazione constructor.
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
            else if (is_object($value)) {
                $oo = $value->getobj();
                $x = get_class($value);
                $x = substr($x, 1, strlen($x));
                $x = singleton::getInstance('F' . $x);
                $x->store($value);
                foreach ($oo as $key => $value) {
                    if ($x->getkey() == $key) {
                        if ($i == 3) {
                            $key = 'valutante';
                            $fields .= ', ' . $key;
                            $values .= ', :' . $key;
                        } else {
                            $key = 'valutato';
                            $fields .= ', ' . $key;
                            $values .= ', :' . $key;
                        }

                    }
                    $i++;
                }
            }

        $query = 'INSERT INTO ' .$this->tab . ' (' . $fields . ') VALUES (' . $values . ');';

        $cc=0;
        foreach ($o as $key => $value)
        {
            if (!is_object($value) AND !is_array($value))
                $return[':' . $key] = $value;
            else if (is_object($value)) {
                $oo = $value->getobj();
                $x = get_class($value);
                $x = substr($x, 1, strlen($x));
                $x = singleton::getInstance('F' . $x);
                foreach ($oo as $key => $value)
                {
                    if ( $x->getkey()== $key)
                    {
                        if ($cc == 0 )
                            $return[':' . 'valutante'] = $value;
                        else
                            $return[':' . 'valutato'] = $value;
                        $cc++;
                    }
                }
            }
        }
print $query;
        print_r($return);
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
     * @param $par
     * @param $o
     * @return array
     * Ricerca una ennupla nel db in base a $par.  $par è un array associativo dove la chiave è il nome della colonna nel db
     * e il valore è il valore dell'attributo in base al quale stiamo effettuando l'interrogazione.
     */
    public function search($par, $o):array
    {
        $s='';
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
        for($i=0;$i<$n;$i++)
        {
            $tt=new FRegistrato();
            $ii=new FRegistrato();
            $e=$tt->load($this->risultato[$i]['valutante']);
            $ee=$ii->load($this->risultato[$i]['valutato']);
            $p = new EValutazione($this->risultato[$i]['commento'],$this->risultato[$i]['voto'],$e,$ee);
            array_push($t, $p);
        }
        return $t;
    }


}