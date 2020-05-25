<?php




class ECartaceo extends ELibro
{
    private $condizione;
    private $proprietario;

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