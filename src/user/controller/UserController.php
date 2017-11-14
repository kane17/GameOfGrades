<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:51
 */

class UserController
{

    public function login()
    {
        $this->console_log($_POST);
    }


    function console_log( $data )
    {
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }


}