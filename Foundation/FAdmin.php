<?php

require_once"autoload.php";
class FAdmin
{
    public function __construct()
    {
        parent::__construct();
        $this->tab='admin';
        $this->key=array('ID');
        $this->return_class = 'EAdmin';
    }
}