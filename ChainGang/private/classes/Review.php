<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 5/8/2019
 * Time: 1:03 PM
 */

/*
 * The basic Review class, this class is used everywhere in the application, this class is saved in the DB
 * This class is compatible with HTML Elements through interpreted rendering *If you don't know what Wiebe means with this, ask him*
 */
class Review
{
    //==Variables==//
    private $dbIndex;
    private $name, $price, $brand, $releaseYear;
    private $frameType, $material, $color, $gender;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args[0];
        $this->name = $args[2];
        $this->price = $args[3];
        $this->brand = $args[4];
        $this->frameType = $args[5];
        $this->material = $args[6];
        $this->gender = $args[7];
        $this->color = $args[8];
        $this->releaseYear = $args[9];
    }
}

?>