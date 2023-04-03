<?php

class Review
{
    private $id;
    private $tourOperatorId;
    private $authorId;

    public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setId($data['id']);
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

    public function getTourOperatorId()
    {
        return $this->tourOperatorId;
    }

    public function setTourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;

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