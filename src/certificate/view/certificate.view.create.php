<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:26
 */


?>
<head>
    <!-- bootstrap usage -->
    <link rel="stylesheet" href="/bootstrap/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<h1>Notentool</h1>
<h4>Zeugnis hochladen</h4>
<div class="container">
    <div class="row">
        <a href="certificate.view.overview.php" role="button" class="btn btn-primary">Übersicht</a>
    </div>
    <br>
    <div class="row">
        <form method="post" action="./formaction.php" id="uploadForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileName">Titel</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="uploadCertificate">Zeugnis auswählen</label>
                <input type="file" class="form-control-file" id="uploadCertificate" name="uploadCertificate">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" id="submit" name="submit">
            </div>
        </form>
    </div>
</div>
</body>
<script src="/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>

