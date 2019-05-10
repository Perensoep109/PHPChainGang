<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 5/8/2019
 * Time: 3:38 PM
 */

include_once("../functions/dbfunctions.php");

class DBOrder
{
    //==Variables==//
    private $dbIndex;
    private $userID;
    private $bikeArr, $state, $date;
    private $streetName, $adressNumber, $postCode;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args['ORDER_ID'];
        $this->userID = $args['USER_ID'];
        $this->bikeArr = $this->convertBikeArr($args['ORDER_BIKES_ARR']);
        $this->state = $args['ORDER_STATE'];
        $this->date = $args['ORDER_DATE'];
        $this->streetName = $args['ORDER_STREETNAME'];
        $this->adressNumber = $args['ORDER_ADRESS_NMBR'];
        $this->postCode = $args['ORDER_POST_CODE'];
    }

    private function convertBikeArr($bikeArray)
    {
        return DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID IN ($bikeArray)");
    }
}

?>