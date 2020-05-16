<?php

require_once'StartSmarty.php';

class CFrontController
{
    public function run($p)
    {

        $method = $_SERVER['REQUEST_METHOD'];
        $resource = explode('/', $p);
        array_shift($resource);
        print $resource[0];
        if ($resource[0] != 'booksharing') {

            $controller = "C" . $resource[0];
            $dir = 'Controller';
            $eledir = scandir($dir);

            if (in_array($controller . ".php", $eledir)) {
                if (isset($resource[1])) {
                    $function = $resource[1];
                    if (method_exists($controller, $function)) {

                        $param = array();
                        for ($i = 2; $i < count($resource); $i++) {
                            $param[] = $resource[$i];
                            $a = $i - 2;
                        }
                        $num = (count($param));
                        if ($num == 0) $controller::$function();
                        else if ($num == 1) $controller::$function($param[0]);
                        else if ($num == 2) $controller::$function($param[0], $param[1]);
                    }
                }
            }
        } else
        {
            $x=StartSmarty::configuration();
            $x->display('index.tpl');
        }

    }
}
?>