<?php

require_once"autoload.php";

class FAdmin
{
    protected $connection;
    protected $risultato;
    protected $tab = 'admin';
    protected $key = 'user';
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

}