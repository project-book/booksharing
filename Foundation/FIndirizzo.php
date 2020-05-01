<?php
require_once "autoload.php";

class FIndirizzo
{
    protected $connection;
    protected $risultato;
    protected $tab='indirizzo';
    protected $key=array('via','civico','cap');
    protected $type;

    public function query($query)
    {
        $stmt = $this->connection->query($query);
        $this->risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=booksharing", 'root', '');;
    }

    public function gettab():string
    {
        return $this->tab;
    }

    public function getkey():array
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
    $stmt->execute($return);
    }

    public function load($chiave):EIndirizzo
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
        print $query;
        $this->query($query);
        return $x = new EIndirizzo($this->risultato[0]['via'], $this->risultato[0]['civico'], $this->risultato[0]['cap'],
            $this->risultato[0]['comune'], $this->risultato[0]['provincia']);
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
}