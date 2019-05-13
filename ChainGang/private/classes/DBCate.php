<?php
/**
 * Created by PhpStorm.
 * DBUser: Eugene
 * Date: 5/13/2019
 * Time: 1:03 PM
 */

/*
 * The basic DBReview class, this class is used everywhere in the application, this class is saved in the DB
 * This class is compatible with HTML Elements through interpreted rendering *If you don't know what Wiebe means with this, ask him*
 */
class DBCate
{
    //==Variables==//
    private $dbIndex;
    private $index, $name;

    //==Functions==//
    /**
     * DBCate constructor.
     * @param $dbIndex
     * @param $index
     * @param $name
     */
    public function __construct($dbIndex, $index, $name)
    {
        $this->dbIndex = $dbIndex;
        $this->index = $index;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDbIndex()
    {
        return $this->dbIndex;
    }


    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}

?>