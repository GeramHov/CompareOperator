<?php

class Destination
{
    private $id;
    private $location;
    private $country;
    private $flag;
    private $image;
    private $price;
    private $tourOperatorId;

    public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setId($data['id']);
        $this->setLocation($data['location']);
        $this->setCountry($data['country']);
        $this->setFlag($data['flag']);
        $this->setImage($data['image']);
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

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getFlag()
    {
        return $this->flag;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}