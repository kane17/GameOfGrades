<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 14.11.2017
 * Time: 10:22
 */


//dispatcher

session_start();

include "builder.php";

// setting default page to overview
if (!isset($_GET['param'])) {
    $_GET['param'] = 'home';
}

$param = $_GET['param'];

// extendable, with as many pages as you want;
switch ($param){
    case "login":
        build("user/view/login.php");
        break;
    case "home":
        build("overview/overview.php");
        break;
    case "grades":
        build("grade/view/grade.view.overview.php");
        break;
    case "logout":
        $_SESSION['user'] = null;
        header("Location:index.php?param=home");
        break;
    case "newGrade":
        build("grade/view/grade.view.create.php");
        break;
    default:
        build("dispatcherror.php");
        break;
}

?>