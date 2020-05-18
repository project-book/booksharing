<?php
require_once 'Foundation/utility/autoload.php';
require_once 'StartSmarty.php';
print $_SERVER['REQUEST_URI'];
$fcontroller=new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);
?>