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
    public function __construct($args=[])
    {
        $this->dbIndex = $args['CATEGORY_ID'];
        $this->index = $args['CATEGORY_INDEX'];
        $this->name = $args['CATEGORY_NAME'];

    }

    public function getDbIndex()
    {
        return $this->dbIndex;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getName()
    {
        return $this->name;
    }
}

?>