<?php

require_once'StartSmarty.php';

class CFrontController
{
    public function run($p)
    {
        
        $resource = explode('/', $p);
        array_shift($resource);
        if($resource[0]!='booksharing')
        	array_shift($resource);
  
        if ($resource[1] != NULL) {
        
          $controller = "C" . $resource[1];
            $dir = 'Controller';
            $eledir = scandir($dir);
            if (in_array($controller . ".php", $eledir)) {
                if (isset($resource[2])) {
                    $function = $resource[2];
                    if (method_exists($controller, $function)) {

                        $param = array();
                        for ($i = 3; $i < count($resource); $i++) {
                            $param[] = $resource[$i];
                            $a = $i - 3;
                        }
                        $num = (count($param));
                        if ($num == 0) $controller::$function();
                        else if ($num == 1) $controller::$function($param[0]);
                        else if ($num == 2) $controller::$function($param[0], $param[1]);
                        else if ($num == 3) $controller::$function($param[0], $param[1],$param[2]);
                }
            }}}
         else
        {
            if(CUtente::isLogged()) {
                $v = new VUtente();
                $v->login();
            }
            else {
                $x = StartSmarty::configuration();
                $x->display('index.tpl');
            }
            
        }

    }
}
?>
