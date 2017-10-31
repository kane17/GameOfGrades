<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 11:05
 */

interface GradeDatabase
{
    function getGradeOfUser($username);
    function getSubjectsOfUser($username);
    function create($grade);
    function update($grade);
    function delete($grade);
    function getUser($id);
    function getGradesOfCoach($coachId);
}