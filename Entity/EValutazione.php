<?php


class EValutazione
{
    private $valutante;
    private $valutato;
    private $Commento;
    private $Voto;

    public function __construct(string $c,int $v,string $e,string $d)
    {
        $this->valutante=$e;
        $this->valutato=$d;
        $this->Commento = $c;
        $this->Voto = $v;
    }

    public function getCommento(): string
    {
        return $this->Commento;
    }

    public function getVoto(): int
    {
        return $this->Voto;
    }

}