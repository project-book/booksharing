<?php

require_once 'ELibro.php';
require_once 'ERegistrato.php';

class EProposta
{
    private $libroprop;
    private $librorich;
    private $stato;
    private $id;

    public function __construct(ECartaceo $r,ECartaceo $l,string $s,int $i)
    {
        $this->libroprop=$r;
        $this->librorich=$l;
        $this->stato=$s;
        $this->id=$i;

    }

    public function getlibroprop()
    {
        return $this->libroprop;
    }

    public function getutenteprop()
    {
        return $this->libroprop->getUser()->getuser();
    }
    public function getlibrorich()
    {
        return $this->librorich;
    }
    public function setstato($s)
    {
            $this->stato=$s;
    }

    public function getstato()
    {
        return $this->stato;
    }

    public function getid()
    {
        return $this->id;
    }


    public function getutenterich()
    {
        return $this->librorich->getUser()->getuser();
    }

    public function getobj():array
    {
        return get_object_vars($this);
    }
}
?>