<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 14.11.2017
 * Time: 10:22
 */


//dispatcher


require_once __DIR__.'/grade/controller/GradeController.php';

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
    case "editGrade":
        build("grade/view/grade.view.edit.php");
        break;
    case "deleteGrade":
        if ($_GET['gradeID'] != null){
            $gradeController = new GradeController();
            $gradeController->deleteGrade($gradeController->getGradeById($_GET['gradeID']));
            header('Location: index.php?param=grades');
        } else {
            sleep(2);
        }
    default:
        build("dispatcherror.php");
        break;
}

?>