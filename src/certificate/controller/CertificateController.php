<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:26
 */

$certificate = include  "../../model/Certificate.php";
$user = include "../../model/User.php";

class CertificateController
{

//    public function __construct(){
//
//        $this->console_log($_POST);
//        $this->console_log($_FILES);
//
//    }

    public function submitForm(){
        $this->console_log($_POST);
        $this->console_log($_FILES);
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }



//    $certificates =

}