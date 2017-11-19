<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 14.11.2017
 * Time: 10:43
 */

echo json_encode($_SESSION);

?>

<h2>Willkommen</h2>

<div class="container">
    <div class="row">
        <?php if ($_SESSION['user']['id'] == null) {?>
            <p>Bitte <a href="./index.php?param=login">hier</a> einloggen</p>
        <?php } else { ?>
            <p><a href="./index.php?param=grades">Noten</a></p>
        <?php } ?>
    </div>
</div>
