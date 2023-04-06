<?php

class TourOperator
{
    private $id;
    private $name;
    private $link;
    private $icon;
    
    public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setId($data['id']);
        $this->setName($data['name']);
        $this->setLink($data['link']);
        $this->setIcon($data['icon']);
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function getIcon()
    {
        return $this->icon;
    }
 
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }
}    
