<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:26
 */

require "../../model/Certificate.php";
require "../../model/User.php";
require "../../database/database-interface/CertificateDatabase.php";

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
                //TODO: read username from session for directory name
                $relPath = '../files/benutzer';
                if (!file_exists($relPath)) {
                    mkdir($relPath, 0777, true);
                }
                $destination = $relPath.'/'.$file['name'];
                move_uploaded_file($file['tmp_name'], $destination);
                $certificate = new Certificate(null, $destination, $title, 1);
                //TODO: save in db
                $this->console_log($certificate);
                header('Location: certificate.view.overview.php');
            }
        }
    }

    public function getCertificates(){

    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

}