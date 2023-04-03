<?php

class Destinations
{
    private $id;
    private $location;
    private $price;
    private $tourOperatorId;

    public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setId($data['id']);
        $this->setLocation($data['location']);
        $this->setPrice($data['price']);
        $this->setTourOperatorId($data['tour_operator_id']);
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

    public function getLocation()
    {
        return $this->location;
    }
 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

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
}