<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 5/9/2019
 * Time: 1:40 PM
 */

include_once("../functions/dbfunctions.php");

DBI::$logError = true;
$mode = 1;

if($mode == 0)
{
    for ($i = 0; $i < 2; $i++)
    {
        DBI::queryDB("INSERT INTO allbikes (BIKE_NAME, BIKE_PRICE, BIKE_BRAND, BIKE_FRAMETYPE, BIKE_MATERIAL, BIKE_GENDER, BIKE_COLOR, BIKE_RELEASEYEAR) VALUES('Fiets', '10', 'Gazelle', 'Sport', 'Koper', 'M', 'Blue', '2002')");
    }
}

if($mode == 1)
{
    $bikes = DBI::queryBikes("SELECT * FROM allbikes");
    $bikeAmount = count($bikes);

    for($i = 0; $i < $bikeAmount; $i++)
    {
        echo $bikes[$i]->getName() . "<br>";
    }
}

echo "Ran";

?>