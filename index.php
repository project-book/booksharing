<?php
require_once 'Foundation/utility/autoload.php';
require_once 'StartSmarty.php';

$fcontroller=new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);

?>
