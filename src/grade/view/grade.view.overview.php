<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:35
 */

require_once '../controller/GradeController.php';

$controller = new GradeController();


?>

    <h2>Noten Übersicht</h2>
    <div class="container">
        <div class="row">
            <button>Note erfassen</button>
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
                    <td><?php echo $grade->getSubject(); ?></td>
                    <td><?php echo $grade->getValue(); ?></td>
                    <td><?php echo $grade->getDescription(); ?></td>
                    <td>
                        <a href="grade.view.edit.php">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        <a href="grade.view.detail.php">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        <a href="<?php $controller->deleteGrade(); ?>">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>