<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:57
 */
require_once '../controller/GradeController.php';

$controller = new GradeController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->createGrade();
    exit();
}
?>
<head>
    <link rel="stylesheet" href="/bootstrap/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
</head>
<body>
<h2>Note erfassen</h2>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group row">
            <label for="subject" class="col-6">Fach</label>
            <select id="subject" name="subject" class="form-control col-6">
                <option>Auswählen...</option>
                <?php foreach ($controller->getSubjects() as $subject) { ?>
                    <option value="<?php echo $subject->getId(); ?>">
                        <?php echo $subject->getName(); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group row">
            <label for="value" class="col-6">Note</label>
            <input type="number" max="6" min="1" id="value" name="value" class="form-control col-6"/>
        </div>
        <div class="form-group row">
            <label for="weight" class="col-6">Gewichtung</label>
            <input id="weight" name="weight" min="1" max="100" type="number" class="form-control col"/>
            <p id="percent" class="col-auto">%</p>
        </div>
        <div class="form-group row">
            <label for="description" class="col-6">Beschreibung</label>
            <textarea class="form-control col-6" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group row">
            <button type="submit" id="submit" name="submit" class="btn col">Erfassen</button>
        </div>
    </form>
</div>
</body>
<script href="/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>
