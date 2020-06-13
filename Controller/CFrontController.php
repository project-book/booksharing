<?php

require_once'StartSmarty.php';

/**
 * Class CFrontController
 * Front controller che richiama il controller opportuno per ogni caso d'uso.
 */
class CFrontController
{
    /**
     * @param $p
     * @throws SmartyException
     */
    public function run($p)
    {
        $resource = explode('/', $p);
        array_shift($resource);
        array_shift($resource);
        if ($resource[0] != 'api') {
            if($resource[0]!=NULL){
            $controller = "C" . $resource[0];

            if (class_exists($controller)){
                if(isset($resource[1])){
                    $function = $resource[1];
                if (method_exists($controller, $function))
                    $real_controller = new $controller();
            {
                $param = array();
                count($resource);
                for ($i = 2; $i < count($resource); $i++) {
                    $param[] = $resource[$i];

                }
                $num = (count($param));
                if ($num == 0) $real_controller->$function();
                else if ($num == 1) $real_controller->$function($param[0]);
                else if ($num == 2) $real_controller->$function($param[0], $param[1]);
                else if ($num == 3) $real_controller->$function($param[0], $param[1], $param[2]);
            }}}
        } else {
            if (CUtente::isLogged()) {
                $v = new VUtente();
                $vv = new VAdmin;
                $utente = $_SESSION['user'];
                if ($utente == 'admin')
                    $vv->homeadmin();
                else
                    $v->home();
            } else {
                $x = StartSmarty::configuration();
                $x->display('index.tpl');
            }

        }

    }//piattaforma mobile
        else
        {if ($resource[1] == 'dettagliutente'){
            CGestioneMobile::dettagliutente($resource[2]);
        }

        elseif ($resource[1] == 'ricerca'){
            $val = json_decode(file_get_contents('php://input'), true);

            CGestioneMobile::ordina($val);

        }

        elseif ($resource[1] == 'login') {
            CGestioneMobile::loginToken();
        }}
    }
}
?>
