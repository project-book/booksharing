<?php


class EValutazione
{
    private $id;
    private $commento;
    private $voto;
    private $valutante;
    private $valutato;

    public function __construct(string $c,string $v,ERegistrato $val,ERegistrato $valto)
    {
        $this->commento = $c;
        $this->voto = $v;
        $this->valutante=new ERegistrato($val->getuser(),$val->getpsw(),$val->getnome(),$val->getcognome(),$val->getemail(),
            new EIndirizzo($val->getindirizzo()->getVia(),$val->getindirizzo()->getNcivico(),$val->getindirizzo()->getcap(),
                $val->getindirizzo()->getComune(),$val->getindirizzo()->getprovincia()),$val->getsaldo());
        $this->valutato=new ERegistrato($valto->getuser(),$valto->getpsw(),$valto->getnome(),$valto->getcognome(),$valto->getemail(),
            new EIndirizzo($valto->getindirizzo()->getVia(),$valto->getindirizzo()->getNcivico(),$valto->getindirizzo()->getcap(),
                $valto->getindirizzo()->getComune(),$valto->getindirizzo()->getprovincia()),$valto->getsaldo());;
    }

    public function getCommento(): string
    {
        return $this->commento;
    }

    public function getVoto(): string
    {
        return $this->voto;
    }

    public function getValutato(): string
    {
        return $this->valutato->getuser();
    }

    public function getValutante(): string
    {
        return $this->valutante->getuser();
    }

    public function getid(): string
    {
        return $this->id();
    }

    public function getobj():array
    {
        return get_object_vars($this);
    }

}