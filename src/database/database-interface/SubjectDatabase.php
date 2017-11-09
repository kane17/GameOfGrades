<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:58
 */

interface SubjectDatabase
{
    function getAllSubjects();
    function appendSubjectToUser($username, $subject, $semester);
    function removeSubjectFromUser($username, $subject);

    // look at interface definition because of the multi-dimensional array $subjects
    /* kann beliebig lang sein
     * $subject = [
     *      [$subject1, $subject2, $subject3, $subject4], //erstes semester
     *      [$subject5, $subject6, $subject7], //zweites semester
     *      [...], //drittes semester
     *      [...], //viertes semester
     *      ...
     * ]
     */
    function setSubjectsOfUser($username, $subjects);

    // gibt selbe liste zurück wie oben beschrieben
    function getSubjectsOfUser($username);
}