<?php
require_once'Smarty-libs/Smarty.class.php';

class StartSmarty
{
    static function configuration()
    {
        $smarty=new smarty();
        $smarty->template_dir='Smarty-dir/templates/';
        $smarty->compile_dir='Smarty-dir/templates_c/';
        $smarty->config_dir='Smarty-dir/configs/';
        $smarty->cache_dir='Smarty-dir/cache/';
        return $smarty;
    }
}
?>
