<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:35
 */

require '../../database/database-impl/GradeDB.php';


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
        return $gradeDB->getGradesOfUser($_SESSION['username']);
    }

    public function deleteGrade() {

    }

    public function getSubjects() {

    }


}