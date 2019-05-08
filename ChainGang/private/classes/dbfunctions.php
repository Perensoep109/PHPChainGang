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
            self::logError("Connection failed, " . $returnVal->connect_error);

        return $returnVal;
    }

    /*
     * This function logs any error which is given as an HTML element anywhere on the page.
     * String-$error stands for the error which must be logged
     * This function gets executed from query functions
     */
    private static function logError($error)
    {
        print($error);
    }

    /*  This function queries the database, then assembles the DB data into an array of bikes
        String-$query stands for the query which will be executed on the database
        Bool-$logerror stands for if the error must be logged as HTML
    */
    public static function queryBikes($query, $logerror)
    {
        $dbConn = self::makeDBConn();

        if(is_null($dbConn))
        {
            if($logerror)
                self::logError("ERROR: Querying data from database created an error: $dbConn->error");
        }


    }

    // This function queries the database, then assembles the DB data into an array of users
    public static function queryUsers($query, $logerror)
    {
    }
}

?>