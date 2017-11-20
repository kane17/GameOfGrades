<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 14.11.2017
 * Time: 10:50
 */


?>


<h2>Bitte einloggen</h2>

<div class="container">
    <form method="post" name="loginForm" action="user/view/formaction.php" style="max-width: 20%">
        <div class="form-group">
            <label for="username">Benutzername</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Benutzername">
        </div>
        <div class="form-group">
            <label for="password">Passwort</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Passwort">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" id="submit">Einloggen</button>
        </div>
    </form>
</div>
