<?php

if(file_exists('config.inc.php')) require_once 'config.inc.php';

class FProposta
{
    protected $connection;
    protected $risultato;
    protected $tab = 'proposta';
    protected $key = 'id';
    protected $type;

    public function __construct()
    {
        try {

            $this->connection = new PDO ("mysql:dbname=".$GLOBALS['database'].";host=localhost; charset=utf8;", $GLOBALS['username'], $GLOBALS['password']);

        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            die;
        }
    }

    public function getris(): array
    {
        return $this->risultato;
    }

    public function query($query)
    {
        $stmt = $this->connection->query($query);
        $this->risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public function delete($val)
    {
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$this->key.'='.'\''.$val.'\'';
        return $this->query($query);
    }


    public function search($par,$o):array
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

    public function update($parametri = array(),$chiave)
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