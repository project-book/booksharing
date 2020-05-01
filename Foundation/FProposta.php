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

    public function getris(): string
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
        $return[':titolo_prop']=$a['titolo'];
        $return[':autore_prop']=$a['autore'];
        $return[':titolo_libro']=$aa['titolo'];
        $return[':autore_libro']=$aa['autore'];
        $return[':proponente']=$a['proprietario']->getuser();
        $return[':ricevente']=$aa['proprietario']->getuser();
        print_r($return);
        $stmt = $this->connection->prepare($query);
        print $query;
        $stmt->execute($return);
    }

    public function delete($val)
    {
        $query='DELETE ' .
            'FROM `'.$this->tab.'` ' .
            'WHERE '.$this->key.'='.'\''.$val.'\'';
        return $this->query($query);
    }
}