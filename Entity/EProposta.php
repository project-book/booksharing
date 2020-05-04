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

    public function getobj():array
    {
        return get_object_vars($this);
    }
}
?>