<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:51
 */

include "../../database/database-impl/UserDB.php";

session_start();

class UserController
{

    public function login()
    {
//        $this->console_log($_POST);
        $userDB = new UserDB();
        if ($_POST['username'] != null && $_POST['password'] != null) {
            $user = $userDB->getUserOfCredentials($_POST['username'], $_POST['password']);
            if ($user != null) {
                $this->console_log($user);
                sleep(2);
                $_SESSION['user'] = array();
                $_SESSION['user']['id'] = $user->getId();
                $_SESSION['user']['name'] = $user->getUsername();
                header('Location:/src/index.php?param=home');
            } else {
                // show message somehow
                header('Location:/src/index.php?param=login');
            }
        }
    }


    function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }


}