<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 11:06
 */
include_once ("AbstractDatabase.php");
include_once (__DIR__."/../database-interface/SubjectDatabase.php");
include_once (__DIR__."/../../model/Subject.php");
class SubjectDB extends AbstractDatabase implements SubjectDatabase{

    function getAllSubjects()
    {
        $stmt = $this->connection->prepare("select * from subject");
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createSubjectsOfResult($result);
    }

    function appendSubjectToUser($username, $subject, $semester)
    {
        $stmt = $this->connection->prepare("insert into subjectconfig (userId, subjectId, semester) values ((select ID from users where USERNAME = ?), ?, ?)");
        $stmt->bind_param("sii", $username, $subject->getId(), $semester);
        $stmt->execute();
    }

    function removeSubjectFromUser($username, $subject)
    {
        $stmt = $this->connection->prepare("delete from subjectconfig where userId = (select ID from users where USERNAME = ?) and subjectId = ?");
        $stmt->bind_param("si", $username, $subject->getId());
        $stmt->execute();
    }

    function setSubjectsOfUser($username, $subjects)
    {
        $this->removeAllSubjectConfigFromUser($username);
        $semesterNumber = 1;
        foreach ($subjects as $semester){
            foreach ($semester as $subject){
                $this->appendSubjectToUser($username, $subject, $semesterNumber);
            }
            $semesterNumber++;
        }
    }

    private function removeAllSubjectConfigFromUser($username)
    {
        $stmt = $this->connection->prepare("delete from subjectconfig where userId = (select ID from users where USERNAME = ?)");
        $stmt->bind_param("s", $username);
        $stmt->execute();
    }

    function getSubjectsOfUser($username)
    {
        $stmt = $this->connection->prepare("select * from subjectconfig where userId = (select ID from users where USERNAME = ?) order by semester ASC");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $subjectConfigs = array();
        while ($row = $result->fetch_assoc()){
            $subjectConfig = new SubjectConfig($row['ID'], $row['userId'], $row['subjectId'], $row['semester']);
            array_push($subjectConfigs, $subjectConfig);
        }
        $subjects = array();
        $actualSemester  = 1;
        $subjectsOfSemester = array();
        foreach($subjectConfigs as $conf){
            if($conf->semester == $actualSemester){
                array_push($subjectsOfSemester, $this->getSubjectById($conf->id));
            } else {
                array_push($subjects, $subjectsOfSemester);
                $actualSemester++;
                $subjectsOfSemester = array();
                array_push($subjectsOfSemester, $this->getSubjectById($conf->id));
            }
        }
        array_push($subjects, $subjectsOfSemester);
        return $subjects;
    }

    private function getSubjectById($id)
    {
        $stmt = $this->connection->prepare("select * from subject where ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createSubjectsOfResult($result)[0];
    }

    private function createSubjectsOfResult($result)
    {
        $subjects = array();
        while ($row = $result->fetch_assoc()){
            $subject = new Subject($row['ID'], $row['NAME']);
            array_push($subjects, $subject);
        }
        return $subjects;
    }
}

class SubjectConfig{
    public $id;
    public $userId;
    public $subjectId;
    public $semester;

    public function __construct($id, $userId, $subjectId, $semester)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->subjectId = $subjectId;
        $this->semester = $semester;
    }
}