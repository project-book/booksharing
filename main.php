<?php
require_once"autoload.php";
$x=new PersistentManager();
$i=new EIndirizzo('via','civico',4,'comune','pro');
$r=new ERegistrato('u','p','n','c','e',$i,5);
$e=new ECartaceo('tit','aut','edit','gen',2020,'nuovo',$r,$i);
$x->store($e);
print_r($x->search('Registrato',array('user'=>'u','cognome'=>'c'),''));





?>
