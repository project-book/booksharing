<?php

require_once "autoload.php";

class FCartaceo
{
    protected $connection;
    protected $risultato;
    protected $tab = 'libro_cartaceo';
    protected $key = array('titolo','autore','user');
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
        print $query;
        print_r($return);
        $stmt->execute($return);

    }

    function load($chiave):ECartaceo
    {
        $s='';
        $i=0;
        foreach ($chiave as $k=>$v) {
            $s .= $this->key[$i] . '=' .'\''.$v.'\'' . ' AND ';
            $i++;
        }
        $s=substr($s,0,strlen($s)-4);
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$s;      print $query;
        $this->query($query);
        print_r($this->risultato);
        $i=new FRegistrato();
        $x=$i->load($this->risultato[0]['user']);
        $p = new ECartaceo($this->risultato[0]['titolo'],$this->risultato[0]['autore'],$this->risultato[0]['editore'],
            $this->risultato[0]['genere'],$this->risultato[0]['anno'],$this->risultato[0]['condizione'],$x);
        return $p;
    }

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
        print $query;
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
        return $t;
    }
}
