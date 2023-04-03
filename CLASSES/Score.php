<?php

class Score
{
    private $id;
    private $value;
    private $TourOperatorId;
    private $authorId;

    public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setId($data['id']);
        $this->setValue($data['value']);
        $this->setTourOperatorId($data['tour_operator_id']);
        $this->setAuthorId($data['author_id']);
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

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getTourOperatorId()
    {
        return $this->TourOperatorId;
    }

    public function setTourOperatorId($TourOperatorId)
    {
        $this->TourOperatorId = $TourOperatorId;

        return $this;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }
}