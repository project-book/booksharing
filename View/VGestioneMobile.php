<?php


/**
 * Class VGestioneMobile
 */
class VGestioneMobile
{
    /**
     * @param $user
     */
    public function showresult($user){
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    /**
     * @param $val
     */
    public function showToken($val) {
        header('Content-Type: application/json');
        echo json_encode($val);
    }

}