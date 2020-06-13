<?php


/**
 * Class EEbook
 */
class EEbook extends ELibro implements JsonSerializable
{
    /**
     * @var int
     */
    private $prezzo_punti;

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
                'prezzo_punti'   => $this->getprezzo()
            ];
    }

    /**
     * EEbook constructor.
     * @param string $t
     * @param string $a
     * @param string $e
     * @param string $g
     * @param int $an
     * @param int $p
     */
    public function __construct(string $t, string $a, string $e, string $g, int $an, int $p)
    {
        parent::__construct($t,$a,$e,$g,$an);
        $this->prezzo_punti = $p;
    }

    /**
     * @return int
     */
    public function getprezzo(): int
    {
        return $this->prezzo_punti;
    }

    /**
     * @param ERegistrato $a
     * @return bool
     */
    public function controllopunti(ERegistrato $a)
    {
        if($a->getsaldo()>=$this->prezzo_punti)
            return true;
    }

    /**
     * @return array
     * Restituzione dell'oggetto in un array.
     */
    public function getobj():array
    {
        return array_merge(parent::getobj(),get_object_vars($this));
    }
}