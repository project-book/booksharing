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
            print $query;
        $stmt = $this->connection->prepare($query);

            print_r ($return);
        $stmt->execute($return);

    }
}