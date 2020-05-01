<?php

require_once "autoload.php";

class ELibro
{
    private $titolo;
    private $autore;
    private $editore;
    private $genere;
    private $anno;

    public function __construct(string $t,string $a,string $e,string $g,int $an)
    {
        $this->titolo=$t;
        $this->autore=$a;
        $this->editore=$e;
        $this->genere=$g;
        $this->anno=$an;
    }


    public function getTitolo(): string
    {
        return $this->titolo;
    }

    public function getAutore(): string
    {
        return $this->autore;
    }

    public function getEditore(): string
    {
        return $this->editore;
    }

    public function getGenere(): string
    {
        return $this->genere;
    }

    public function getAnno(): int
    {
        return $this->anno;
    }

    public function setTitolo(string $a)
    {
        return $this->titolo = $a;
    }

    public function setAutore(string $b)
    {
        return $this->autore = $b;
    }

    public function setEditore(string $c)
    {
        return $this->editore= $c;
    }

    public function setGenere(string $d)
    {
        return $this->genere= $d;
    }

    public function setAnno(int $e)
    {
        return $this->anno= $e;
    }

    public function getobj():array
    {
        return get_object_vars($this);
    }

}