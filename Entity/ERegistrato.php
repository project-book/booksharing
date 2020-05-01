<?php

require_once "EIndirizzo.php";
require_once "EUtente.php";

class ERegistrato extends EUtente
{

    private $nome;
    private $cognome;
    private $EMAIL;
    private $indirizzo;

    private $saldo;

    public function __construct(string $a,string $b,string $c,string $d,string $e,EIndirizzo $i,int $s)
    {
       parent::__construct($a,$b);
        $this->nome=$c;
        $this->cognome=$d;
        $this->EMAIL=$e;
        $this->indirizzo=new EIndirizzo($i->getVia(),$i->getNcivico(),$i->getcap(),$i->getComune(),$i->getprovincia());
        $this->saldo=$s;
    }

    public function getindirizzo(): EIndirizzo
    {
        return $this->indirizzo;
    }

    public function getsaldo(): int
    {
        return $this->saldo;
    }

    public function getnome(): string
    {
        return $this->nome;
    }

    public function getcognome(): string
    {
        return $this->cognome;
    }

    public function getemail(): string
    {
        return $this->EMAIL;
    }

    public function getobj():array
    {
        return array_merge(parent::getobj(),get_object_vars($this));
    }
}