<?php

if(file_exists('config.inc.php')) require_once 'config.inc.php';

/**
 * Class FProposta
 */
class FProposta
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
    protected $tab = 'proposta';
    /**
     * @var string
     */
    protected $key = 'id';
    /**
     * @var
     */
    protected $type;

    /**
     * FProposta constructor.
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
     * @return array
     */
    public function getris(): array
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
        $fields = ' proponente , ricevente , titolo_libro ,autore_libro ,titolo_prop ,autore_prop,stato';
        $values = ' :proponente , :ricevente , :titolo_libro , :autore_libro,:titolo_prop ,:autore_prop,:stato';
        $query = 'INSERT INTO ' . $this->tab . ' (' . $fields . ') VALUES (' . $values . ');';
        $x = $objec->getobj();
        $a=$x['libroprop']->getobj();
        $aa=$x['librorich']->getobj();

        $return[':proponente']=$a['proprietario']->getuser();
        $return[':ricevente']=$aa['proprietario']->getuser();
        $return[':titolo_libro']=$aa['titolo'];
        $return[':autore_libro']=$aa['autore'];
        $return[':titolo_prop']=$a['titolo'];
        $return[':autore_prop']=$a['autore'];
        $return[':stato']='';

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
        for($i=0;$i<$n;$i++) {
            $l=new FCartaceo();
            $ll=new FCartaceo();
            $xx=$l->load(array($this->risultato[$i]['titolo_libro'],$this->risultato[$i]['autore_libro'],$this->risultato[$i]['ricevente']));
            $x=$ll->load(array($this->risultato[$i]['titolo_prop'],$this->risultato[$i]['autore_prop'],$this->risultato[$i]['proponente']));
            $p = new EProposta($x,$xx,$this->risultato[$i]["stato"],$this->risultato[$i]["id"]);
            array_push($t,$p);
        }
        return $t;
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

        if(gettype($chiave)=="integer")
            $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$this->key.'='.$chiave;
        if(gettype($chiave)=="string")
            $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$this->key.'='.'\''.$chiave.'\'';
        $stmt=$this->connection->prepare($query);
        $stmt->execute();
    }

    /**
     * @param $chiave
     * @return EProposta
     * Ricerca in base alla chiave primaria la ennupla nel db e restituisce l'oggetto.
     */
    public function load($chiave):EProposta
    {
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$this->key.'='.'\''.$chiave.'\'';
        $this->query($query);

        $i=new FCartaceo();
        $ii=new FCartaceo();
        $x=$i->load(array($this->risultato[0]['titolo_prop'],$this->risultato[0]['autore_prop'],$this->risultato[0]['proponente']));
        $xx=$ii->load(array($this->risultato[0]['titolo_libro'],$this->risultato[0]['autore_libro'],$this->risultato[0]['ricevente']));
        $p = new EProposta($x,$xx,$this->risultato[0]["stato"],$this->risultato[0]["id"]);
        return $p;

    }
}