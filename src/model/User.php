<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:22
 */

class User
{
    public $id; //int
    public $name; //string
    public $username; //string
    public $password; //string
    public $email; //string
    public $coach; //boolean
    public $lowGradeLimit; //double
    public $highGradeLimit; //double
    public $coachId; //int

    public function __construct($idP, $nameP, $usernameP, $passwordP, $emailP,
                                $coachP, $lowGradeLimitP, $highGradeLimitP, $coachIdP){
        $this->id = $idP;
        $this->name = $nameP;
        $this->username = $usernameP;
        $this->password = $passwordP;
        $this->email = $emailP;
        $this->coach = $coachP;
        if($this->coach){
            $this->lowGradeLimit = null;
            $this->highGradeLimit = null;
            $this->coachId = null;
        }else{
            $this->lowGradeLimit = $lowGradeLimitP;
            $this->highGradeLimit = $highGradeLimitP;
            $this->coachId = $coachIdP;
        }
    }
}