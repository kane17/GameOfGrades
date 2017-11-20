<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:35
 */

require __DIR__.'/../../database/database-impl/GradeDB.php';
require __DIR__.'/../../database/database-impl/SubjectDB.php';


class GradeController
{
    public function createGrade() {

    }

    public function editGrade() {

    }

    public function getGrade() {

    }

    public function getGrades() {
        $gradeDB = new GradeDB();
        return $gradeDB->getGradesOfUser($_SESSION['user']['name']);
    }

    public function deleteGrade() {

    }

    public function getSubjects() {
        $subjectDB = new SubjectDB();
        return $subjectDB->getSubjectsOfUser($_SESSION['user']['name']);
    }


}