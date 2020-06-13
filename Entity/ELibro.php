<?php


/**
 * Class ELibro
 */
class ELibro
{
    /**
     * @var string
     */
    private $titolo;
    /**
     * @var string
     */
    private $autore;
    /**
     * @var string
     */
    private $editore;
    /**
     * @var string
     */
    private $genere;
    /**
     * @var int
     */
    private $anno;

    /**
     * ELibro constructor.
     * @param string $t
     * @param string $a
     * @param string $e
     * @param string $g
     * @param int $an
     */
    public function __construct(string $t, string $a, string $e, string $g, int $an)
    {
        $this->titolo=$t;
        $this->autore=$a;
        $this->editore=$e;
        $this->genere=$g;
        $this->anno=$an;
    }


    /**
     * @return string
     */
    public function getTitolo(): string
    {
        return $this->titolo;
    }

    /**
     * @return string
     */
    public function getAutore(): string
    {
        return $this->autore;
    }

    /**
     * @return string
     */
    public function getEditore(): string
    {
        return $this->editore;
    }

    /**
     * @return string
     */
    public function getGenere(): string
    {
        return $this->genere;
    }

    /**
     * @return int
     */
    public function getAnno(): int
    {
        return $this->anno;
    }


    /**
     * @return array
     * Restituzione dell'oggetto in un array.
     */
    public function getobj():array
    {
        return get_object_vars($this);
    }

}