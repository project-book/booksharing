<?php

require_once "autoload.php";

class FValutazione
{
    protected $connection;
    protected $risultato;
    protected $tab = 'valutazione';
    protected $key = 'id';
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
        for($i=0;$i<$n;$i++)
        {
            $tt=new FRegistrato();
            $ii=new FRegistrato();
            $e=$tt->load($this->risultato[$i]['valutante']);
            $ee=$ii->load($this->risultato[$i]['valutato']);
            $p = new EValutazione($this->risultato[$i]['id'],$this->risultato[$i]['commento'],$this->risultato[$i]['voto'],$e,$ee);
            array_push($t, $p);
        }
        return $t;
    }
}