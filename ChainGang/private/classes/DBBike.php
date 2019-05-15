<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 5/8/2019
 * Time: 1:03 PM
 */

/*
 * The basic bike class, this class is used everywhere in the application, this class is saved in the DB
 * This class is compatible with HTML Elements through interpreted rendering *If you don't know what Wiebe means with this, ask him*
 */
class DBBike
{
    //==Variables==//
    private $dbIndex;
    private $name, $price, $brand, $releaseYear;
    private $frameType, $material, $color, $category;

    //==Functions==//
    public function __construct($args=[])
    {
        $this->dbIndex = $args['BIKE_ID'];
        $this->name = $args['BIKE_NAME'];
        $this->price = $args['BIKE_PRICE'];
        $this->brand = $args['BIKE_BRAND'];
        $this->frameType = $args['BIKE_FRAMETYPE'];
        $this->material = $args['BIKE_MATERIAL'];
        $this->color = $args['BIKE_COLOR'];
        $this->releaseYear = $args['BIKE_RELEASEYEAR'];
        $this->category = $args['BIKE_CATEGORY_ID'];
        $this->imagePaths = $this->splitImagePaths($args['BIKE_IMAGES']);
        $this->description = $args['BIKE_DESCRIPTION']; 
    }

    private function splitImagePaths($images)
    {
        return explode(',', $images);
    }

    //=Getters & Setters=//
    //Getters
    public function getDbIndex()
    {
        return $this->dbIndex;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    public function getFrameType()
    {
        return $this->frameType;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getImagePaths()
    {
        return $this->imagePaths;
    }
}

?>