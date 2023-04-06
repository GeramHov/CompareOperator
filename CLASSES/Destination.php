<?php

class Destination
{
    private $id;
    private $location;
    private $country;
    private $flag;
    private $image;
    private $startingPrice;

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
        $this->setstartingPrice($data['starting_price']);
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

    public function getstartingPrice()
    {
        return $this->startingPrice;
    }

    public function setstartingPrice($price)
    {
        $this->startingPrice = $price;

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