<?php


/**
 * Class EIndirizzo
 */
class EIndirizzo
{
    /**
     * @var string
     */
    private $via;
    /**
     * @var string
     */
    private $civico;
    /**
     * @var string
     */
    private $cap;
    /**
     * @var string
     */
    private $comune;
    /**
     * @var string
     */
    private $provincia;

    /**
     * EIndirizzo constructor.
     * @param string $v
     * @param string $n
     * @param string $d
     * @param string $c
     * @param string $e
     */
    public function __construct(string $v, string $n, string $d, string $c, string $e)
    {
        $this->via=$v;
        $this->civico=$n;
        $this->cap=$d;
        $this->comune=$c;
        $this->provincia=$e;
    }

    /**
     * @return string
     */
    public function getVia(): string
    {
        return $this->via;
    }

    /**
     * @return string
     */
    public function getNcivico(): string
    {
        return $this->civico;
    }


    /**
     * @return string
     */
    public function getcap(): string
    {
        return $this->cap;
    }

    /**
     * @return string
     */
    public function getprovincia(): string
    {
        return $this->provincia;
    }

    /**
     * @return string
     */
    public function getComune(): string
    {
        return $this->comune;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Via " . " $this->via" . "," ." $this->civico " .PHP_EOL. "$this->comune";
    }

    /**
     * @return array
     * Restituzione dell'oggetto in un array.
     */
    public function getobj()
    {
        return get_object_vars($this);
    }


}
?>