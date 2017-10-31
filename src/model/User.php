<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:22
 */

class User
{
    private $id; //int
    private $name; //string
    private $username; //string
    private $password; //string
    private $email; //string
    private $coach; //boolean
    private $lowGradeLimit; //double
    private $highGradeLimit; //double
    private $coachId; //int

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

    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * @param mixed $coach
     */
    public function setCoach($coach)
    {
        $this->coach = $coach;
    }

    /**
     * @return mixed
     */
    public function getLowGradeLimit()
    {
        return $this->lowGradeLimit;
    }

    /**
     * @param mixed $lowGradeLimit
     */
    public function setLowGradeLimit($lowGradeLimit)
    {
        $this->lowGradeLimit = $lowGradeLimit;
    }

    /**
     * @return mixed
     */
    public function getHighGradeLimit()
    {
        return $this->highGradeLimit;
    }

    /**
     * @param mixed $highGradeLimit
     */
    public function setHighGradeLimit($highGradeLimit)
    {
        $this->highGradeLimit = $highGradeLimit;
    }

    /**
     * @return mixed
     */
    public function getCoachId()
    {
        return $this->coachId;
    }

    /**
     * @param mixed $coachId
     */
    public function setCoachId($coachId)
    {
        $this->coachId = $coachId;
    }


}