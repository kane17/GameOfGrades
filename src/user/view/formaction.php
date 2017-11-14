<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 14.11.2017
 * Time: 11:13
 */

require_once '../controller/UserController.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UserController();
    $controller->login();
}
?>