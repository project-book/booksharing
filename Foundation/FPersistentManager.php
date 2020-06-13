<?php


/**
 * Class FPersistentManager
 */
class FPersistentManager
{

    /**
     * @param $o
     * Richiama la funzione di inserimento della ennupla nel db dell'istanza passata come parametro.
     */
    public function store($o)
    {
        $s=get_class($o);
        $s=substr($s,1,strlen($s)-1);
        $x=singleton::getInstance('F'.$s);
        $x->store($o);
    }

    /**
     * @param $o
     * @param array $par
     * @param $key
     * Richiama la funzione di aggiornamento della ennupla nel db dell'istanza passata come parametro.
     */
    public function update($o, $par=array(), $key)
    {
        $x=singleton::getInstance('F'.$o);
        $x->update($par,$key);
    }

    /**
     * @param $o
     * @param $val
     * Richiama la funzione di cancellazione della ennupla nel db dell'istanza passata come parametro.
     */
    public function delete($o, $val)
    {
        $x=singleton::getInstance('F'.$o);
        $x->delete($val);
    }

    /**
     * @param $s
     * @param array $par
     * @param $ord
     * @return array
   * Richiama la funzione di interrogazione nel db dell'istanza passata come parametro.
     */
    public function search($s, $par = array(), $ord):array
    {
        $x=singleton::getInstance('F'.$s);
        return $x->search($par,$ord);
    }

    /**
     * @param $o
     * @param $key
     * @return mixed
    * Richiama la funzione di ricerca per chiave primaria nel db dell'istanza passata come parametro.
     */
    public function load($o, $key)
    {
        $x=singleton::getInstance('F'.$o);
        return $x->load($key);
    }
}