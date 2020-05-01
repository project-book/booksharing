<?php

require_once 'ELibro.php';
require_once 'ERegistrato.php';

class EProposta
{
    private $libroprop;
    private $librorich;

    public function __construct(ELibro $r,ELibro $l)
    {
        $this->libroprop=$r;
        $this->librorich=$l;
    }

    public function getprop():ERegistrato
    {
        return $this->proponente;
    }

    public function getric():ERegistrato
    {
        return $this->ricevente;
    }

    public function getlibro():ELibro
    {
        return $this->ricevente;
    }

    public function __toString():string
    {
        return 'proponente: '.$this->proponente->__toString().'ricevente: '.$this->ricevente->__toString().'libro: '.$this->libro->__toString();
    }

    public function getobj():array
    {
        return get_object_vars($this);
    }
}
?>