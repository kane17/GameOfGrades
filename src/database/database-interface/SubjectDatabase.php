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
    function appendSubjectToUser($username, $subject);

    // look at interface definition because of the multi-dimensional array $subjects
    function setSubjectsOfUser($username, $subjects);
    function getSubjectsOfUser($username);
}