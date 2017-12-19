<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:35
 */

require_once __DIR__.'/../controller/GradeController.php';

$controller = new GradeController();

?>

    <h2>Noten Übersicht</h2>
    <div class="container">
        <div class="row">
            <a href="./index.php?param=newGrade"><button>Note erfassen</button></a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Fach</th>
                    <th scope="col">Note</th>
                    <th scope="col">Beschreibung</th>
                    <th scope="col">Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($controller->getGrades() as $grade) { ?>
                <tr>
                    <td><?php echo $controller->getSubjectNameById($grade->getSubjectId()); ?></td>
                    <td><?php echo $grade->getValue(); ?></td>
                    <td><?php echo $grade->getComment(); ?></td>
                    <td>
                        <a href="grade.view.edit.php">
                            <i class="material-icons">mode_edit</i>
                        </a>
<!--                        <a href="grade.view.detail.php">-->
<!--                            <i class="material-icons">mode_edit</i>-->
<!--                        </a>-->
                        <a href="<?php $controller->deleteGrade(); ?>">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
<!--                <tr>-->
<!--                    <td>Mathematik</td>-->
<!--                    <td>4</td>-->
<!--                    <td>Der Test ist schiefgelaufen.</td>-->
<!--                    <td>Bearbeiten</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Deutsch</td>-->
<!--                    <td>5.3</td>-->
<!--                    <td>relativ guter Test</td>-->
<!--                    <td>Bearbeiten</td>-->
<!--                </tr>-->
            </tbody>
        </table>
    </div>