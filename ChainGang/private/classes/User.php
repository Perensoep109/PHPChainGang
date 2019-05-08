<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 5/8/2019
 * Time: 1:03 PM
 */

/*
 * The basic user class, this class is used everywhere in the application, this class is saved in the DB
 * This class is compatible with HTML Elements through interpreted rendering *If you don't know what Wiebe means with this, ask him*
 */
class User
{
    //==Variables==//
    private $dbIndex;
    private $name, $gender, $age;
    private $email, $password, $username;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args[0];
        $this->name = $args[1];
        $this->email = $args[2];
        $this->age = $args[3];
        $this->gender = $args[4];
        $this->password = $args[5];
        $this->username = $args[6];
    }

    //=Getters & Setters=//
    // Getters
    public function getDbIndex()
    {
        return $this->dbIndex;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->username;
    }
}

?>