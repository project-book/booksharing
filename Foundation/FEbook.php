<?php

require_once "autoload.php";

class FEbook
{
    protected $connection;
    protected $risultato;
    protected $tab = 'ebook';
    protected $key = array('titolo','autore');
    protected $type;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=booksharing", 'root', '');;
    }

    public function query($query)
    {
        $stmt = $this->connection->query($query);
        $this->risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function gettab(): string
    {
        return $this->tab;
    }

    public function getkey(): array
    {
        return $this->key;
    }

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
        print $query;
        print_r($return);
        $stmt->execute($return);
    }

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
        print ($query);
        return $x = new EEbook($this->risultato[0]['titolo'], $this->risultato[0]['autore'], $this->risultato[0]['editore'],
            $this->risultato[0]['genere'], $this->risultato[0]['anno'],$this->risultato[0]['prezzo_punti']);
    }

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

    public function update($parametri = array(),$chiave = array())
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
            $l = new FIndirizzo();
            $x = $l->load(array($this->risultato[$i]['via'], $this->risultato[$i]['civico'], (int)$this->risultato[$i]['cap']));
            $p = new ERegistrato($this->risultato[$i]['user'], $this->risultato[$i]['password'], $this->risultato[$i]['nome'], $this->risultato[$i]['cognome'], $this->risultato[$i]['email'], $x, $this->risultato[$i]['saldo']);

            array_push($t,$p);
        }
        return $t;
    }
}