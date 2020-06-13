<?php

require_once 'ELibro.php';
require_once 'ERegistrato.php';

/**
 * Class EProposta
 */
class EProposta
{
    /**
     * @var ECartaceo
     */
    private $libroprop;
    /**
     * @var ECartaceo
     */
    private $librorich;
    /**
     * @var string
     */
    private $stato;
    /**
     * @var int
     */
    private $id;

    /**
     * EProposta constructor.
     * @param ECartaceo $r
     * @param ECartaceo $l
     * @param string $s
     * @param int $i
     */
    public function __construct(ECartaceo $r, ECartaceo $l, string $s, int $i)
    {
        $this->libroprop=$r;
        $this->librorich=$l;
        $this->stato=$s;
        $this->id=$i;

    }

    /**
     * @return ECartaceo
     */
    public function getlibroprop()
    {
        return $this->libroprop;
    }

    /**
     * @return string
     */
    public function getutenteprop()
    {
        return $this->libroprop->getUser()->getuser();
    }

    /**
     * @return ECartaceo
     */
    public function getlibrorich()
    {
        return $this->librorich;
    }

    /**
     * @param $s
     */
    public function setstato($s)
    {
            $this->stato=$s;
    }

    /**
     * @return string
     */
    public function getstato()
    {
        return $this->stato;
    }

    /**
     * @return int
     */
    public function getid()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getutenterich()
    {
        return $this->librorich->getUser()->getuser();
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
?>