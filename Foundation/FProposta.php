<?php


class FProposta
{
    protected $connection;
    protected $risultato;
    protected $tab = 'proposta';
    protected $key = 'id';
    protected $type;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=booksharing", 'root', '');;
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
        $fields = 'proponente , ricevente , titolo_libro ,autore_libro ,titolo_prop ,autore_prop';
        $values = ':proponente , :ricevente , :titolo_libro , :autore_libro,:titolo_prop ,:autore_prop';
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

        $stmt = $this->connection->prepare($query);
        print $query;
        print_r($return);
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
            $x=$l->load(array($this->risultato[$i]['titolo_libro'],$this->risultato[$i]['autore_libro'],$this->risultato[$i]['proponente']));
            $xx=$ll->load(array($this->risultato[$i]['titolo_prop'],$this->risultato[$i]['autore_prop'],$this->risultato[$i]['ricevente']));
            $p = new EProposta($x,$xx);
            array_push($t,$p);
        }
        return $t;
    }
}