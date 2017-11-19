<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 11:07
 */
include_once ("AbstractDatabase.php");
include_once (__DIR__."/../database-interface/UserDatabase.php");
include_once (__DIR__."/../../model/User.php");
class UserDB extends AbstractDatabase implements UserDatabase{

    function getAllUsers()
    {
        $stmt = $this->connection->prepare("select * from users");
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createUsersOfResult($result);
    }

    function getUserById($id)
    {
        $stmt = $this->connection->prepare("select * from users where ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createUsersOfResult($result)[0];
    }

    function getUserByUsername($username)
    {
        $stmt = $this->connection->prepare("select * from users where USERNAME = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createUsersOfResult($result)[0];
    }

    function create($user)
    {
        $stmt = $this->connection->prepare("insert into users (NAME, USERNAME, PASSWORD, EMAIL, COACH, LOWGRADELIMIT, HIGHGRADELIMIT, coachID) values (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiddi", $user->getName(), $user->getUsername(), $user->getPassword(), $user->getEmail(), $user->getCoach(), $user->getLowGradeLimit(), $user->getHighGradeLimit(), $user->getCoachId());
        $stmt->execute();
    }

    function update($user)
    {
        $stmt = $this->connection->prepare("update users set NAME = ?, USERNAME = ?, PASSWORD = ?, EMAIL = ?, COACH = ?, LOWGRADELIMIT = ?, HIGHGRADELIMIT = ?, coachID = ? where ID = ?");
        $stmt->bind_param("ssssiddii", $user->getName(), $user->getUsername(), $user->getPassword(), $user->getEmail(), $user->getCoach(), $user->getLowGradeLimit(), $user->getHighGradeLimit(), $user->getCoachId(), $user->getId());
        $stmt->execute();
    }

    function delete($id)
    {
        $stmt = $this->connection->prepare("delete from users where ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    function getUserOfCredentials($username, $password)
    {
        $stmt = $this->connection->prepare("select * from users where USERNAME = ? and PASSWORD = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = $this->createUsersOfResult($result);
        if (count($list) == 1){
            return $list[0];
        }
        return null;
    }

    private function createUsersOfResult($result){
        $users = array();
        while ($row = $result->fetch_assoc()){
            $user = new User($row['ID'], $row['NAME'], $row['USERNAME'] , $row['PASSWORD'], $row['EMAIL'], $row['COACH'], $row['LOWGRADELIMIT'], $row['HIGHGRADELIMIT'], $row['coachID']);
            array_push($users, $user);
        }
        return $users;
    }
}