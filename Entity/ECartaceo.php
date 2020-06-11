<?php




class ECartaceo extends ELibro implements JsonSerializable
{
    private $condizione;
    private $proprietario;
    private $esaurito=0;

    public function jsonSerialize()
    {
        return
            [
                'titolo'   => $this->getTitolo(),
                'autore'   => $this->getAutore(),
                'editore'   => $this->getEditore(),
                'genere'   => $this->getGenere(),
                'anno'   => $this->getAnno(),
                'condizione'   => $this->getCondizione(),
                'propietario' => $this->getUser(),
            ];
    }


    public function __construct(string $t,string $a,string $e,string $g,int $an,string $c,ERegistrato $reg)
    {
        parent::__construct($t,$a,$e,$g,$an);
        $this->condizione = $c;
        $this->proprietario=new ERegistrato($reg->getuser(),$reg->getpsw(),$reg->getnome(),$reg->getcognome(), $reg->getemail(),
            new EIndirizzo($reg->getindirizzo()->getVia(),$reg->getindirizzo()->getNcivico(),
                $reg->getindirizzo()->getcap(),$reg->getindirizzo()->getComune(),$reg->getindirizzo()->getprovincia())
               ,$reg->getsaldo());
    }

    public function getCondizione(): string
    {
        return $this->condizione;
    }

    public function getesaurito(): int
    {
        return $this->esaurito;
    }

    public function getUser()
    {
        return $this->proprietario;
    }

    public function getobj():array
    {
        $y=parent::getobj();
        return array_merge($y,get_object_vars($this));
    }


}