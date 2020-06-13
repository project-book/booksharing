<?php


/**
 * Class EUtente
 */
class EUtente
{
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $password;

    /**
     * EUtente constructor.
     * @param string $a
     * @param string $b
     */
    public function __construct(string $a, string $b)
    {
        $this->user=$a;
        $this->password=$b;
    }

    /**
     * @return string
     */
    public function getuser():string
    {
        return $this->user;
    }

    /**
     * @param $a
     * @return mixed
     */
    public function setuser($a)
    {
        return $this->user=$a;
    }

    /**
     * @return string
     */
    public function getpsw():string
    {
        return $this->password;
    }

    /**
     * @param $a
     * @return mixed
     */
    public function setpsw($a)
    {
        return $this->password=$a;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->user.$this->password;
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
?>