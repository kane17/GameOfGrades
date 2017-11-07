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

    public function handleSubmit(){
        $this->console_log($_POST);
        $this->console_log($_FILES);
        if ($_POST['submit']){
            $fileName = $_POST['fileName'];
            if ($_FILES['uploadCertificate']){
                $file = $_FILES['uploadCertificate'];
                move_uploaded_file($file['tmp_name'], '../files/'.$file['name']);
            }
        }
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

}