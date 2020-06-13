<?php


/**
 * Class ECartaceo
 */
class ECartaceo extends ELibro implements JsonSerializable
{
    /**
     * @var string
     */
    private $condizione;
    /**
     * @var ERegistrato
     */
    private $proprietario;
    /**
     * @var int
     */
    private $esaurito=0;

    /**
     * @return array|mixed
     * Funzione per la conversione da json in array php.
     */

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


    /**
     * ECartaceo constructor.
     * @param string $t
     * @param string $a
     * @param string $e
     * @param string $g
     * @param int $an
     * @param string $c
     * @param ERegistrato $reg
     */
    public function __construct(string $t, string $a, string $e, string $g, int $an, string $c, ERegistrato $reg)
    {
        parent::__construct($t,$a,$e,$g,$an);
        $this->condizione = $c;
        $this->proprietario=new ERegistrato($reg->getuser(),$reg->getpsw(),$reg->getnome(),$reg->getcognome(), $reg->getemail(),
            new EIndirizzo($reg->getindirizzo()->getVia(),$reg->getindirizzo()->getNcivico(),
                $reg->getindirizzo()->getcap(),$reg->getindirizzo()->getComune(),$reg->getindirizzo()->getprovincia())
               ,$reg->getsaldo());
    }

    /**
     * @return string
     */
    public function getCondizione(): string
    {
        return $this->condizione;
    }

    /**
     * @return int
     */
    public function getesaurito(): int
    {
        return $this->esaurito;
    }

    /**
     * @return ERegistrato
     */
    public function getUser()
    {
        return $this->proprietario;
    }

    /**
     * @return array
     * Restituzione dell'oggetto in un array.
     */
    public function getobj():array
    {
        $y=parent::getobj();
        return array_merge($y,get_object_vars($this));
    }


}