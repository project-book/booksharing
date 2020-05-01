<?php
require_once'autoload.php';
require_once 'PersistentManager.php';

class FRegistrato
{
    protected $connection;
    protected $risultato;
    protected $tab = 'Registrato';
    protected $key = 'user';
    protected $type;

    public function getkey()
    {
        return $this->key;
    }

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=booksharing", 'root', '');;
    }

    public function getris():array
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

    public function delete($val)
    {
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$this->key.'='.'\''.$val.'\'';
        return $this->query($query);
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
        print $query;
        $stmt=$this->connection->prepare($query);
        $stmt->execute();
    }

    public function load($chiave):ERegistrato
    {
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$this->key.'='.'\''.$chiave.'\'';      print $query;
        $this->query($query);
         print_r($this->risultato);
          $i=new FIndirizzo();
           $s=(int)$this->risultato[0]['cap'];
       $x=$i->load(array($this->risultato[0]['via'],$this->risultato[0]['civico'],$s));
        $x = new ERegistrato($this->risultato[0]['user'],$this->risultato[0]['password'],$this->risultato[0]['nome'],
            $this->risultato[0]['cognome'],$this->risultato[0]['email'],$x,$this->risultato[0]['saldo']);
        return $x;
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
