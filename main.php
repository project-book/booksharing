<?php
require_once"autoload.php";
$x=new PersistentManager();
$p=new ERegistrato('d','d','d','d','d',new EIndirizzo('s','s',4,'s','s'),8);
$pp=new ERegistrato('dedw','d','d','d','d',new EIndirizzo('s','s',4,'s','s'),8);

$rr=new ECartaceo('uuu','pp','n','c',7,'',$p);
$r=new ECartaceo('u','p','n','c',7,'s',$pp);





$ee=new EAdmin('mario','rossi');
$tr=new EEbook('o','p','edit','gen',1320,23);
$aa=new EValutazione(1,'cuai',5,$pp,$p);
$bb=new EValutazione(2,'rgdc',5,$p,$pp);
$cc=new EValutazione(3,'crfese',5,$pp,$p);
$x->store($tr);
//print_r($x->search('Valutazione',array('voto'=>5),'valutato'));
//$x->store($ee);
//$x->delete('Admin','mario');
//$x->delete('Valutazione',1);
//$x->search('Cartaceo',array('genere'=>'c','titolo'=>'u'),'titolo');
//$x->load('Registrato','d');
//$c=new EProposta($r,$rr);
//$x->store($c);
//print_r($x->search('Proposta',array('titolo_libro'=>'uu',),''));
//var_dump($x->load('Indirizzo',array('via','civic',4)));
//print_r($x->search('Cartaceo',array('user'=>'dedw'),'titolo'));
//print_r($x->search('Registrato',array('nome'=>'d'),'user'));
print_r($x->search('Ebook',array('titolo'=>'titu'),''));


?>
