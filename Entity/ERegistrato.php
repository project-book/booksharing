<?php


/**
 * Class ERegistrato
 */
class ERegistrato implements JsonSerializable
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
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $cognome;
    /**
     * @var string
     */
    private $email;
    /**
     * @var EIndirizzo
     */
    private $indirizzo;
    /**
     * @var int
     */
    private $saldo;
    //private $media;

    /**
     * @return array|mixed
     * Conversione da json in array php.
     */
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

    /**
     * ERegistrato constructor.
     * @param string $u
     * @param string $p
     * @param string $c
     * @param string $d
     * @param string $e
     * @param EIndirizzo $i
     * @param int $s
     */
    public function __construct(string $u, string $p, string $c, string $d, string $e, EIndirizzo $i, int $s)
    {
        $this->user=$u;
        $this->password=$p;
        $this->nome=$c;
        $this->cognome=$d;
        $this->email=$e;
        $this->indirizzo=new EIndirizzo($i->getVia(),$i->getNcivico(),$i->getcap(),$i->getComune(),$i->getprovincia());
        $this->saldo=$s;
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
     * @return EIndirizzo
     */
    public function getindirizzo(): EIndirizzo
    {
        return $this->indirizzo;
    }

    /**
     * @return int
     */
    public function getsaldo(): int
    {
        return $this->saldo;
    }

    /**
     * @return string
     */
    public function getnome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getcognome(): string
    {
        return $this->cognome;
    }

    /**
     * @return string
     */
    public function getemail(): string
    {
        return $this->email;
    }

    /**
     * @return array
     * Restituzione dell'oggetto in un array
     */
    public function getobj():array
    {
        return get_object_vars($this);
    }

    /**
     * @param $t
     * @return float|int
     * Funzione che calcola la valutazione media dell'utente.
     */
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