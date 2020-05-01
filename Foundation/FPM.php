<?php

class FPM
{
    protected $connection;
    protected $risultato;
    protected $tab;
    protected $key;
    protected $type;

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
            print $query;
            print_r($return);
       $stmt->execute($return);
    }

    public function update($object)
    {
        $x=$object->getobj();
        $i=0;
        $fields='';
        foreach ($x as $key=>$value) {
                if ($i==0) {
                    $fields.=$key.' = '.$value;
                } else {
                    $fields.=', '.$key.'='.$value;
                }
                $i++;
            }
        foreach ($x as $key=>$value) {
            if ($key == $this->key)
                $n = $value;
        }
            if(gettype($n)=="integer")
                $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$this->key.'='.$n;
           if(gettype($n)=="string")
                $query='UPDATE '.$this->tab.' SET '.$fields.' WHERE '.$this->key.'='.'\''.$n.'\'';
           print $query;
        $stmt=$this->connection->prepare($query);
        $stmt->execute();
    }

    public function load($key) {
        $c=count($this->key);
        $s='';
        for($i=0;$i<$c;$i++)
            $s.=' '.$this->key[$i].'='.'\''.$key[$i].'\''.'AND';
            $s=substr($s,0,strlen($s)-3);
        $query='SELECT * ' .
            'FROM '.$this->tab.' ' .
            'WHERE '.$s.';';
        $this->query($query);
    }
    function search($parametri = array(), $ordinamento )
    {
        $s='';
      foreach ($parametri as $key=>$value)
          if(gettype($value)=="integer")
          $s.=' '.$key.'='.$value.' AND';
          else
              $s.=' '.$key.'='.'\''.$value.'\''.'AND';
        $s=substr($s,0,strlen($s)-3);
        $query='SELECT * ' .
            'FROM `'.$this->tab.'` '.'WHERE '.$s.' ';
        if ($ordinamento!='')
            $query.='ORDER BY '.$ordinamento.' ';
        $this->query($query);
    }
    public function close() {
        $this->connection=NULL;
    }

    public function delete($object) {
        $arrayObject=(array)$object;
        $c=count($this->key);
        $s=' ';
        foreach ($arrayObject as $key=>$value) {
            for($i=0;$i<$c;$i++)
             if (strstr($key, $this->key[$i]))
                 if(gettype($value)=="integer")
                $s .= strstr($key, $this->key[$i]) . '=' . $value.' AND ';
                 else
            $s .= strstr($key, $this->key[$i]) . '=' .'\''.$value.'\''.' AND ';
        }
        $s=substr($s,0,strlen($s)-4);
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$s.';';
        unset($object);
        return $this->query($query);
    }


}