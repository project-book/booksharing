<?php
require_once"Foundation/utility/autoload.php";
$x=new FPersistentManager();
$p=new ERegistrato('d','d','d','d','d',new EIndirizzo('s','s',4,'s','s'),8);
$pp=new ERegistrato('dedw','d','d','d','d',new EIndirizzo('s','s',4,'s','s'),8);

$rr=new ECartaceo('u','p','n','c',7,'',$p);
$r=new ECartaceo('uuu','pp','n','c',7,'s',$pp);





$ee=new EAdmin('bruno','verdi');
$tr=new EEbook('o','p','edit','gen',1320,23);
$aa=new EValutazione(1,'cuai',5,$pp,$p);
$bb=new EValutazione(2,'rgdc',5,$p,$pp);
$cc=new EValutazione(3,'crfese',5,$pp,$p);
//$ww=new EProposta($rr,$r);
//$x->delete('Proposta',24);
//print_r($x->search('Valutazione',array('id'=>1),''));
//$x->store($ee);
//$x->delete('Admin','mario');
//$x->delete('Valutazione',1);
//$x->search('Cartaceo',array('genere'=>'c','titolo'=>'u'),'titolo');
//$x->load('Registrato','d');
//$c=new EProposta($r,$rr);
//$x->store($c);
//print_r($x->search('Proposta',array('titolo_libro'=>'uuu',),''));
//var_dump($x->load('Cartaceo',array('u','p','dedw')));
//print_r($x->search('Cartaceo',array('user'=>'dedw'),'titolo'));
//print_r($x->search('Registrato',array('nome'=>'d'),'user'));
//print_r($x->search('Ebook',array('genere'=>'gen'),'autore'));


?>
