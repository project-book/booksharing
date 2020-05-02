<?php
require_once"autoload.php";
$x=new PersistentManager();
$p=new ERegistrato('d','d','d','d','d',new EIndirizzo('s','s',4,'s','s'),8);
$pp=new ERegistrato('dedw','d','d','d','d',new EIndirizzo('s','s',4,'s','s'),8);

$rr=new ECartaceo('uuu','pp','n','c',7,'',$p);
$r=new ECartaceo('u','p','n','c',7,'s',$pp);


var_dump($x->load('Cartaceo',array('u','pp','dedw')));
var_dump($x->search('Cartaceo',array('genere'=>'c','titolo'=>'u'),'titolo'));



$aa=new EValutazione(1,'cuai',5,$pp,$p);
$x->store($aa);
//$x->search('Cartaceo',array('genere'=>'c','titolo'=>'u'),'titolo');



?>
