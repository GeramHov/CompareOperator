<?php

class User {
    private $name;
    private $id;
    private $firstname;
    private $lastname;
    private $email;

   public function __construct($data)
    {
        $this->hydrate($data); 
    }

    public function hydrate(array $data) {
        $this->setName($data['name']);
        $this->setId($data['id']);
        $this->setFirstName($data['firstname']);
        $this->setLastName($data['lastname']);
        $this->setEmail($data['email']);
    }


    public function getName() {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName() {
        return $this->firstname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastName() {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    
}