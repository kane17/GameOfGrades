<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 11:04
 */

interface CertificateDatabase
{
    function getCertificatesOfUser($username);
    function getCertificatesForCoach($username);
}