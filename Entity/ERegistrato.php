<?php


class ERegistrato implements JsonSerializable
{
    private $user;
    private $password;
    private $nome;
    private $cognome;
    private $email;
    private $indirizzo;
    private $saldo;
    //private $media;

    public function jsonSerialize()
    {
        return
            [
                'user'   => $this->getuser(),
                'password'   => $this->getpsw(),
                'nome'   => $this->getnome(),
                'cognome'   => $this->getcognome(),
                'email'   => $this->getemail(),
                'via'   => $this->getindirizzo()->getVia(),
                'Ncivico'   => $this->getindirizzo()->getNcivico(),
                'cap'   => $this->getindirizzo()->getcap(),
                'comune'   => $this->getindirizzo()->getComune(),
                'provincia'   => $this->getindirizzo()->getprovincia(),
                'saldo'   => $this->getsaldo(),

            ];
    }

    public function __construct(string $u,string $p,string $c,string $d,string $e,EIndirizzo $i,int $s)
    {
        $this->user=$u;
        $this->password=$p;
        $this->nome=$c;
        $this->cognome=$d;
        $this->email=$e;
        $this->indirizzo=new EIndirizzo($i->getVia(),$i->getNcivico(),$i->getcap(),$i->getComune(),$i->getprovincia());
        $this->saldo=$s;
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

    public function getindirizzo(): EIndirizzo
    {
        return $this->indirizzo;
    }

    public function getsaldo(): int
    {
        return $this->saldo;
    }

    public function getnome(): string
    {
        return $this->nome;
    }

    public function getcognome(): string
    {
        return $this->cognome;
    }

    public function getemail(): string
    {
        return $this->email;
    }

    public function getobj():array
    {
        return get_object_vars($this);
    }

    public function calcolamedia($t)
    {
        $n=0;
        for($i=0;$i<count($t);$i++)
        {
            $n=$n+$t[$i];
        }

        if($n==0)
            return 0;
        else
            return $n/count($t);
    }
}