<?php

require('smarty-libs/Smarty.class.php');
class VCercaLibro
{
private $smarty;
public function __construct()
{
    $smarty = new Smarty();
    $smarty->setTemplateDir('smarty-dir/templates');
    $smarty->setCompileDir('smarty-dir/templates_c');
    $smarty->setCacheDir('smarty-dir/cache');
    $smarty->setConfigDir('smarty-dir/configs')
}



}