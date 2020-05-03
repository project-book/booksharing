<?php

require_once"autoload.php";

class EIndirizzo
{
    private $via;
    private $civico;
    private $cap;
    private $comune;
    private $provincia;

    public function __construct(string $v,string $n,int $d,string $c,string $e)
    {
        $this->via=$v;
        $this->civico=$n;
        $this->cap=$d;
        $this->comune=$c;
        $this->provincia=$e;
    }

    public function getVia(): string
    {
        return $this->via;
    }

    public function getNcivico(): string
    {
        return $this->civico;
    }


    public function getcap(): int
    {
        return $this->cap;
    }

    public function getprovincia(): string
    {
        return $this->provincia;
    }

    public function getComune(): string
    {
        return $this->comune;
    }


    public function __toString(): string
    {
        return "Via " . " $this->via" . "," ." $this->civico " .PHP_EOL. "$this->comune";
    }

    public function getobj()
    {
        return get_object_vars($this);
    }


}
?>