<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 5/8/2019
 * Time: 3:38 PM
 */

class DBOrder
{
    //==Variables==//
    private $dbIndex;
    private $userID;
    private $email, $password, $username;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args['ORDER_ID'];
        $this->userID = $args['USER_ID'];
        $this->email = $args['USER_EMAIL'];
        $this->age = $args['USER_AGE'];
        $this->gender = $args['USER_GENDER'];
        $this->password = $args['USER_PASSWORD'];
        $this->username = $args['USER_USERNAME'];
    }

    private function convertBikeArr()
}

?>