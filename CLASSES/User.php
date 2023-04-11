<?php

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $admin;
    private $image;
    private $created_at;
    private $last_connection;
    private $banned;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        $this->setId($data['id']);
        $this->setFirstName($data['firstname']);
        $this->setLastName($data['lastname']);
        $this->setEmail($data['email']);
        $this->setAdmin($data['admin']);
        $this->setImage($data['image']);
        $this->setCreated_at($data['created_at']);
        $this->setLast_connection($data['last_connection']);
        $this->setBanned($data['banned']);
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

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;

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

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getLast_connection()
    {
        return $this->last_connection;
    }

    public function setLast_connection($last_connection)
    {
        $this->last_connection = $last_connection;

        return $this;
    }

    public function getBanned()
    {
        return $this->banned;
    }
 
    public function setBanned($banned)
    {
        $this->banned = $banned;

        return $this;
    }
}