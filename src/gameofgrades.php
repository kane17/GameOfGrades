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
//    case "login":
//        build("pages/logbuch_login.php");
//        break;
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
        header("Location:gameofgrades.php?param=home");
        break;
    default:
        build("dispatcherror.php");
        break;
//    case "logout":
//        // resetting userdata session variable for logout
//        $_SESSION['userdata'] = null;
//        /* setting success message for logout
//         * TODO: create own page for functions of logout for mvc reasons
//         */
//        $_SESSION['message'] = "Du hast dich erfolgreich ausgeloggt";
//        header("Location:logbuch.php?param=message");
//        break;
//    case "newPost":
//        build("pages/logbuch_newPost.php");
//        break;
//    case "message":
//        build("pages/logbuch_message.php");
//        break;
//    default:
//        // on default build overview
//        build("pages/logbuch_overview.php");
}

?>