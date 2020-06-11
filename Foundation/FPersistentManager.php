<?php


class FPersistentManager
{

    public function store($o)
    {
        $s=get_class($o);
        $s=substr($s,1,strlen($s)-1);
        $x=singleton::getInstance('F'.$s);
        $x->store($o);
    }

    public function update($o,$par=array(),$key)
    {
        $x=singleton::getInstance('F'.$o);
        $x->update($par,$key);
    }

    public function delete($o,$val)
    {
        $x=singleton::getInstance('F'.$o);
        $x->delete($val);
    }

    public function search($s,$par = array(),$ord):array
    {
        $x=singleton::getInstance('F'.$s);
        return $x->search($par,$ord);
    }

    public function load($o,$key)
    {
        $x=singleton::getInstance('F'.$o);
        return $x->load($key);
    }
}