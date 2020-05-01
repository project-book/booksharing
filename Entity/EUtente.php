<?php


class EUtente
{
    private $user;
    private $password;

    public function __construct(string $a,string $b)
{
    $this->user=$a;
    $this->password=$b;
}

    public function getuser():string
    {
        return $this->user;
    }

    public function setuser($a)
    {
        return $this->user=$a;
    }

    public function getpsw():string
    {
        return $this->password;
    }

    public function setpsw($a)
    {
        return $this->password=$a;
    }
    public function __toString()
{
    return $this->user.$this->password;
}

public function getobj():array
{
    return get_object_vars($this);
}
}
?>