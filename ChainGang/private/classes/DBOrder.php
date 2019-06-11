<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 5/8/2019
 * Time: 3:38 PM
 */

include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");

class DBOrder
{
    //==Variables==//
    private $dbIndex;
    private $userID;
    private $bikeArr, $state, $date;
    private $streetName, $adresNumber, $postCode;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args['ORDER_ID'];
        $this->userID = $args['ORDER_USER_ID'];
        $this->bikeArr = $this->convertBikeArr($args['ORDER_BIKES_ARR']);
        $this->state = $args['ORDER_STATE'];
        $this->date = $args['ORDER_DATE'];
        $this->streetName = $args['ORDER_STREETNAME'];
        $this->adresNumber = $args['ORDER_ADRESS'];
        $this->postCode = $args['ORDER_POST_CODE'];
    }

    private function convertBikeArr($bikeArray)
    {
        return DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID IN ($bikeArray)");
    }

    //=Getters & Setters=//
    // Getters
    public function getDbIndex()
    {
        return $this->dbIndex;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getBikeArr()
    {
        return $this->bikeArr;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStreetName()
    {
        return $this->streetName;
    }

    public function getAdresNumber()
    {
        return $this->adresNumber;
    }

    public function getPostCode()
    {
        return $this->postCode;
    }
}

?>