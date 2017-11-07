<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:26
 */

require "../../model/Certificate.php";
$user = include "../../model/User.php";
$certificateDB  = include "../../database/database-interface/CertificateDatabase.php";

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
            $title = $_POST['title'];
            if ($_FILES['uploadCertificate']){
                $file = $_FILES['uploadCertificate'];
                //TODO: create directory for each user
                $destination = '../files/'.$file['name'];
                move_uploaded_file($file['tmp_name'], $destination);
                $certificate = new Certificate(null, $destination, $title, 1);

            }
        }
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

}