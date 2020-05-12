<?php


class EEbook extends ELibro
{
    private $prezzo_punti;

    public function __construct(string $t,string $a,string $e,string $g,int $an,int $p)
    {
        parent::__construct($t,$a,$e,$g,$an);
        $this->prezzo_punti = $p;
    }

    public function getPrezzo(): int
    {
        return $this->prezzo_punti;
    }

    public function controllopunti(ERegistrato $a):boolean
    {
        if($a->getsaldo()>=$this->prezzo_punti)
            return true;
    }

    public function getobj():array
    {
        return array_merge(parent::getobj(),get_object_vars($this));
    }
}