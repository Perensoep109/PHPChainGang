<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 5/9/2019
 * Time: 1:40 PM
 */

include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");
DBI::$logError = true;
$mode = 4;

if($mode == 0)
{
    for ($i = 0; $i < 2; $i++)
    {
        //DBI::queryDB("INSERT INTO allbikes (BIKE_NAME, BIKE_PRICE, BIKE_BRAND, BIKE_FRAMETYPE, BIKE_MATERIAL, BIKE_GENDER, BIKE_COLOR, BIKE_RELEASEYEAR) VALUES('Fiets', '10', 'Gazelle', 'Sport', 'Koper', 'M', 'Blue', '2002')");
        DBI::queryDB("INSERT INTO allusers (USER_NAME, USER_EMAIL, USER_AGE, USER_GENDER, USER_PASSWORD, USER_USERNAME) VALUES('Eugene', '123@312mail.com', '21', 'A', 'yeet', 'ppExtendus')");
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

if($mode == 2)
{
    $users = DBI::queryUsers("SELECT * FROM allusers");

    if(!is_null($users))
    {
        foreach ($users as $user)
        {
            echo $user->getName() . "<br>";
        }
    }
}

if($mode == 3)
{
    $string = "10,3,23,101";
    $splittedStrings = explode(',', $string);

    foreach ($splittedStrings as $val)
        echo $val . "<br>";
}
if($mode == 4)
{
    $categories = DBI::queryCategories("SELECT * FROM allcategories");

    if($categories != null)
    {
        foreach ($categories as $category)
        {
            echo $category->getName() . "<br>";
        }
    }
}

echo "Ran";

?>