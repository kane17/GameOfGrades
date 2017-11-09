<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 08:27
 */
include_once ("AbstractDatabase.php");
include_once ("database-interface/CertificateDatabase.php");
include_once ("../model/Certificate.php");
class CertificateDB extends AbstractDatabase implements CertificateDatabase {

    public function __construct()
    {
        parent::__construct();
    }

    function getCertificatesOfUser($username)
    {
        $stmt = $this->connection->prepare("select * from report where userID = (select ID from users where USERNAME = ?)");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createCertificatesOfResult($result);
    }

    function getCertificatesForCoach($username)
    {
        $stmt = $this->connection->prepare("select * from report where userId in (select ID from users where coachId = (select ID from users where USERNAME = ?))");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->createCertificatesOfResult($result);
    }

    function create($certificate)
    {
        $stmt = $this->connection->prepare("insert into report (PATH, TITLE, userID) values (?, ?, ?)");
        $stmt->bind_param("ssi", $certificate->getPath(), $certificate->getTitle(), $certificate->getUserId());
        $stmt->execute();
    }

    private function createCertificatesOfResult($result){
        $certificates = array();
        while ($row = $result->fetch_assoc()){
            $cert = new Certificate($row['ID'], $row['PATH'], $row['TITLE'], $row['userID']);
            array_push($certificates, $cert);
        }
        return $certificates;
    }
}