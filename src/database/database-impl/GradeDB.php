<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 10:53
 */
include_once ("AbstractDatabase.php");
include_once (__DIR__."/../database-interface/GradeDatabase.php");
include_once (__DIR__."/../../model/Grade.php");
class GradeDB extends AbstractDatabase implements GradeDatabase {

    public function __construct()
    {
        parent::__construct();
    }

    function getGradesOfUser($username)
    {
        $stmt = $this->connection->prepare("select * from grade where userID = (select ID from users where USERNAME = ?)");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createGradesOfResult($result);
    }

    function create($grade)
    {
        $stmt = $this->connection->prepare("insert into grade (VALUE, userID, subjectID, COMMENT, WEIGHT, REPORT) VALUES (?, ?, ?, ?, ?, ?)");
        $value = $grade->getValue();
        $userid = $grade->getUserId();
        $subjectid = $grade->getSubjectId();
        $comment = $grade->getComment();
        $weight = $grade->getWeight();
        $isCertificateRelevant = $grade->isCertificateRelevant();
        $stmt->bind_param("diisii", $value, $userid, $subjectid, $comment, $weight, $isCertificateRelevant);
        $stmt->execute();
    }

    function update($grade)
    {
        $stmt = $this->connection->prepare("update grade set VALUE = ?, userID = ?, subjectID = ?, COMMENT = ?, WEIGHT = ?, REPORT = ? where ID = ?");
        $stmt->bind_param("diisiii", $grade->getValue(), $grade->getUserId(), $grade->getSubjectId(), $grade->getComment(), $grade->getWeight(), $grade->isCertificateRelevant(), $grade->getId());
        $stmt->execute();

    }

    function delete($grade)
    {
        $stmt = $this->connection->prepare("delete from grade where ID = ?");
        $stmt->bind_param("i", $grade->getId());
        $stmt->execute();
    }

    function getGradesOfCoach($coachId)
    {
        $stmt = $this->connection->prepare("select * from grade where userID in (select ID from users where coachID = ?)");
        $stmt->bind_param("i", $coachId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createGradesOfResult($result);
    }

    private function createGradesOfResult($result)
    {
        $grades = array();
        while ($row = $result->fetch_assoc()){
            $grade = new Grade($row['ID'], $row['VALUE'], $row['userID'], $row['subjectID'], $row['COMMENT'], $row['WEIGHT'], $row['REPORT']);
            array_push($grades, $grade);
        }
        return $grades;
    }
}