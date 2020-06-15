<?php


/**
 * Class EValutazione
 */
class EValutazione
{
    /**
     * @var
     */
    private $id;
    /**
     * @var string
     */
    private $commento;
    /**
     * @var string
     */
    private $voto;
    /**
     * @var ERegistrato
     */
    private $valutante;
    /**
     * @var ERegistrato
     */
    private $valutato;

    /**
     * EValutazione constructor.
     * @param string $c
     * @param string $v
     * @param ERegistrato $val
     * @param ERegistrato $valto
     */
    public function __construct($c, $v, ERegistrato $val, ERegistrato $valto)
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

    /**
     * @return string
     */
    public function getCommento(): string
    {
        return $this->commento;
    }

    /**
     * @return string
     */
    public function getVoto(): string
    {
        return $this->voto;
    }

    /**
     * @return string
     */
    public function getValutato(): string
    {
        return $this->valutato->getuser();
    }

    /**
     * @return string
     */
    public function getValutante(): string
    {
        return $this->valutante->getuser();
    }

    /**
     * @return string
     */
    public function getid(): string
    {
        return $this->id();
    }

    /**
     * @return array
     *Restituzione dell'oggetto in un array.
     */
    public function getobj():array
    {
        return get_object_vars($this);
    }

}