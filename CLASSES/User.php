<?php

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $admin;

    private $created_at;
    private $last_connection;
    private $banned;

    private $image;

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

        $this->setCreated_at($data['created_at']);
        $this->setLast_connection($data['last_connection']);
        $this->setBanned($data['banned']);

        $this->setImage($data['image']);

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



    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of last_connection
     */
    public function getLast_connection()
    {
        return $this->last_connection;
    }

    /**
     * Set the value of last_connection
     *
     * @return  self
     */
    public function setLast_connection($last_connection)
    {
        $this->last_connection = $last_connection;

        return $this;
    }

    /**
     * Get the value of banned
     */
    public function getBanned()
    {
        return $this->banned;
    }

    /**
     * Set the value of banned
     *
     * @return  self
     */
    public function setBanned($banned)
    {
        $this->banned = $banned;

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