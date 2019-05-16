<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 5/8/2019
 * Time: 1:03 PM
 */

/*
 * The basic user class, this class is used everywhere in the application, this class is saved in the DB
 * This class is compatible with HTML Elements through interpreted rendering *If you don't know what Wiebe means with this, ask him*
 */
class DBUser
{
    //==Variables==//
    private $dbIndex;
    private $name, $gender, $age, $image;
    private $email, $password, $username;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args['USER_ID'];
        $this->name = $args['USER_NAME'];
        $this->email = $args['USER_EMAIL'];
        $this->age = $args['USER_AGE'];
        $this->gender = $args['USER_GENDER'];
        $this->password = $args['USER_PASSWORD'];
        $this->username = $args['USER_USERNAME'];
        $this->image = $args['USER_IMAGE'];
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
    public function getImage()
    {
        return $this->image;
    }
}

?>