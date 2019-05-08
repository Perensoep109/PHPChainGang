<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 08/05/2019
 * Time: 11:23
 */

class DBI
{
    // This function creates a connection to the database
    private static function makeDBConn()
    {
        $returnVal = new mysqli("", "", "", "");

        if($returnVal->connect_error)
            die("Connection failed, " . $returnVal->connect_error);

        return $returnVal;
    }

    // This function queries the database, then assembles the DB data into an array of bikes
    public static function queryBikes($query)
    {
        $dbConn = self::makeDBConn();

        if(is_null($dbConn))
            return;
    }

    // This function queries the database, then assembles the DB data into an array of users
    public static function queryUsers($query)
    {
    }
}

?>