<?php

class Feedback
{
    private $id;
    private $message;
    private $tourOperatorName;
    private $note;
    private $userId;

    public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setId($data['id']);
        $this->setMessage($data['message']);
        $this->setTourOperatorName($data['tour_operator_name']);
        $this->setNote($data['note']);
        $this->setUserId($data['user_id']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTourOperatorName()
    {
        return $this->tourOperatorName;
    }

    public function setTourOperatorName($tourOperatorName)
    {
        $this->tourOperatorName = $tourOperatorName;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }
 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}