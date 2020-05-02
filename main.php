<?php
require_once"autoload.php";
$x=new PersistentManager();
$i=new EIndirizzo('via','civico',4,'comune','pro');
$r=new ERegistrato('u','p','n','c','e',$i,5);
$x->store($r);





?>
