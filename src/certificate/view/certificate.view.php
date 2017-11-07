<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:26
 */
require_once '../controller/CertificateController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new CertificateController();
    $controller->submitForm();
    exit();
}

?>
<head>
    <!-- bootstrap usage -->
    <link rel="stylesheet" href="/bootstrap/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<h1>Notentool</h1>
<h4>Zeugnisse verwalten</h4>
<div class="container">
    <div class="row">
        <form method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileName">Titel</label>
                <input type="text" class="form-control" id="fileName">
            </div>
            <div class="form-group">
                <label for="uploadCertificate">Zeugnis auswählen</label>
                <input type="file" class="form-control-file" id="uploadCertificate">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" id="submit">
            </div>
        </form>
    </div>
</div>
</body>
<script src="/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>

