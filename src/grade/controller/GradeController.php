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
        $gradeDB = new GradeDB();
        $this->console_log("thing");
        if ($_POST['subject'] != null && $_POST['value'] != null && $_POST['weight'] != null && $_POST['description'] != null){
            $grade = new Grade(null, $_POST['value'], $_SESSION['user']['id'], $_POST['subject'], $_POST['description'], $_POST['weight'], 0);
            $this->console_log($grade);
            $gradeDB->create($grade);
            header('Location:index.php?param=grades');
        } else {
            sleep(2);
        }
    }

    public function editGrade() {
        $gradeDB = new GradeDB();
        if ($_POST['subject'] != null && $_POST['value'] != null && $_POST['weight'] != null && $_POST['description'] != null){
            $grade = new Grade(null, $_POST['value'], $_SESSION['user']['id'], $_POST['subject'], $_POST['description'], $_POST['weight'], 0);
            $this->console_log($grade);
            $gradeDB->update($grade);
            header('Location:index.php?param=grades');
        }
    }

    public function getGrade() {
//        $gradeDB = new GradeDB();
//        if ($_POST['gradeID'] != null){
//            foreach ($this->getGrades() as $grade){
//                if ($grade['id'] == $_POST['gradeID']){
//                    return $grade;
//                }
//            }
//        }

    }

    public function getGradeById($id){
//        $gradeDB = new GradeDB();
        if ($id != null) {
            foreach ($this->getGrades() as $grade) {
                if ($grade->getId() == $id) {
                    return $grade;
                }
            }
        }
    }

    public function getGrades() {
        $gradeDB = new GradeDB();
        return $gradeDB->getGradesOfUser($_SESSION['user']['name']);
    }

    public function deleteGrade($grade) {
        $gradeDB = new GradeDB();
        if ($grade != null) {
            $gradeDB->delete($grade);
            header('Location: index.php?param=grades');
        }
    }

    public function getSubjects() {
        $subjectDB = new SubjectDB();
        return $subjectDB->getAllSubjects();
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    public function getSubjectNameById($givenSubId){
        $subjectDB = new SubjectDB();
        $subjects = $subjectDB->getAllSubjects();
        foreach ($subjects as $subject){
            if ($givenSubId == $subject->getId()){
                return $subject->getName();
            }
        }
    }

}