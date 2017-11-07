<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 09:06
 */

require_once '../controller/CertificateController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new CertificateController();
    $controller->handleSubmit();
    exit();
}
?>