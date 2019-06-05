<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 5/8/2019
 * Time: 1:03 PM
 */

/*
 * The basic DBReview class, this class is used everywhere in the application, this class is saved in the DB
 * This class is compatible with HTML Elements through interpreted rendering *If you don't know what Wiebe means with this, ask him*
 */
class DBReview
{
    //==Variables==//
    private $dbIndex;
    private $userID, $text, $timePlaced;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args['REVIEW_ID'];
        $this->userID = $args['REVIEW_USER_ID'];
        $this->text = $args['REVIEW_TEXT'];
        $this->timePlaced = $args['REVIEW_TIME_PLACED'];
    }

    public function getDbIndex()
    {
        return $this->dbIndex;
    }

    public function getUserID()
    {
        return $this->userID;
    }


    public function getText()
    {
        return $this->text;
    }


    public function getTimePlaced()
    {
        return $this->timePlaced;
    }

}

?>

