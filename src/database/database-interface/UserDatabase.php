<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:17
 */

interface UserDatabase
{
    function getAllUsers();
    function getUserById($id);
    function getUserByUsername($username);
    function create($user);
    function update($user);
    function delete($id);
    function getUserOfCredentials($username, $password);
}