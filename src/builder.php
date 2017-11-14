<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 14.11.2017
 * Time: 10:30
 */


function build($file)
{
    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="/bootstrap/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Notentool</title>
    </head>
    <body>

    <?php require_once $file; ?>

    </body>
    <script href="/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>
    </html>
    <?php
}