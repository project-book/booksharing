<?php

require_once"EUtente.php";

class EAdmin extends  EUtente
{

    private $vendite;

    public function __construct(string $a,string $b)
    {
        parent::__construct($a,$b);
        $this->vendite=array();
    }

}