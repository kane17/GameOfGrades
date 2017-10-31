<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:35
 */

class Grade
{
    private $id; //integer
    private $value; //double
    private $userId; //integer
    private $subjectId; //integer
    private $comment; //string
    private $weight; //integer
    private $isCertificateRelevant; //boolean

    /**
     * Grade constructor.
     * @param $id
     * @param $value
     * @param $userId
     * @param $subjectId
     * @param $comment
     * @param $weight
     * @param $isCertificateRelevant
     */
    public function __construct($id, $value, $userId, $subjectId, $comment, $weight, $isCertificateRelevant)
    {
        $this->id = $id;
        $this->value = $value;
        $this->userId = $userId;
        $this->subjectId = $subjectId;
        $this->comment = $comment;
        $this->weight = $weight;
        $this->isCertificateRelevant = $isCertificateRelevant;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

    /**
     * @param mixed $subjectId
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getisCertificateRelevant()
    {
        return $this->isCertificateRelevant;
    }

    /**
     * @param mixed $isCertificateRelevant
     */
    public function setIsCertificateRelevant($isCertificateRelevant)
    {
        $this->isCertificateRelevant = $isCertificateRelevant;
    }


}