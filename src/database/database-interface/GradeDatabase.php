<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 11:05
 */

interface GradeDatabase
{
    function getGradesOfUser($username);
    function create($grade);
    function update($grade);
    function delete($grade);
    function getGradesOfCoach($coachId);
}