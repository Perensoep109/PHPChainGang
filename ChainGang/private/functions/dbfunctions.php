<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 08/05/2019
 * Time: 11:23
 */

include_once("../classes/DBBike.php");
include_once("../classes/DBOrder.php");
include_once("../classes/DBReview.php");
include_once("../classes/DBUser.php");

/*  The DBI class stands for, Data Base Interface.
 *  This class holds a set of static functions, which can be executed from anywhere.
 *  This class manages all the interactions with the database, adding new bikes, querying bikes, adding & removing users
 *  All bikes, users or reviews that are queried are transformed into an array of the correct data type and then returned.
 *  These features are pre-written, so that there are proper functions which do this. To prevent redundant code which can be of lower quality.
 */
final class DBI
{
    //===Variables===//
    public static $logError = false;

    //===Functions===//
    /*  This function creates a connection to the database
     *  This function gets executed everytime a new query to the database is made
     *  This function returns an object of mysqli
     *  This function is only executed by this class, everytime a query is made
     */
    private static final function makeDBConn()
    {
        $returnVal = new mysqli("localhost", "root", "", "waken_chaingangfietsen");

        if($returnVal->connect_error)
            self::logError("Connection failed, " . $returnVal->connect_error);

        return $returnVal;
    }

    /*
     * This function logs any error which is given as an HTML element anywhere on the page.
     * String-$error stands for the error which must be logged
     * This function returns an array of users
     * This function gets executed from query functions
     */
    private static final function logError($error)
    {
        echo "<h1 class='errorLog'>$error</h1>>";
    }

    /*  This function exists, for the sole reason if a query needs to be executed on the database itself
     *  String-$query stands for the query which will be executed on the database itself
     *  This function returns an array of database rows (The data is NOT transformed into the correct data type)
     *  This function is user executed and executed by every other query function in the DBI
     */
    public static final function queryDB($query)
    {
        $dbConn = self::makeDBConn();

        if($dbConn->connect_error)
        {
            if(self::$logError)
                self::logError("ERROR: Querying data from database created an error: $dbConn->error");

            // The function crashed with an error, return nothing
            return null;
        }

        $val = $dbConn->query($query);

        if(self::$logError)
            self::logError($dbConn->error);

        return $val;
    }

    /*  This function queries the database, then assembles the DB data into an array of bikes
    *   String-$query stands for the query which will be executed on the database
    *   This function returns an array of bikes
    *   This function is user executed
    */
    public static final function queryBikes($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if(is_null($data))
            return null;

        $rowAmount = $data->num_rows;

        if($rowAmount > 0)
        {
            $returnValue = array();

            // Construct the return value of bike[]
            for($i = 0; $i < $rowAmount; $i++)
            {
                $row = $data->fetch_assoc();
                array_push($returnValue, new DBBike($row));
            }

            return $returnValue;
        }

        // No data was pulled from the database
        return null;
    }

    /*  This function queries the database, then assembles the DB data into an array of users
     *  String-$query stands for the query which will be executed on the database
     *  This function returns an array of users
     *  This function is user executed
     */
    public static final function queryUsers($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if(is_null($data))
            return null;

        $rowAmount = $data->num_rows;

        if($rowAmount > 0)
        {
            $returnValue = array();

            // Construct the return value of bike[]
            for($i = 0; $i < $rowAmount; $i++)
            {
                $row = $data->fetch_assoc();
                array_push($returnValue, new DBUser($row));
            }

            return $returnValue;
        }

        // No data was pulled from the database
        return null;
    }

    /*  This function queries the database, then assembles the DB data into an array of reviews
     *  String-$query stands for the query which will be executed on the database
     *  This function returns an array of reviews
     *  This function is user executed
     */
    public static final function queryReviews($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if(is_null($data))
            return null;

        $rowAmount = $data->num_rows;

        if($rowAmount > 0)
        {
            $returnValue = array();

            // Construct the return value of bike[]
            for($i = 0; $i < $rowAmount; $i++)
            {
                $row = $data->fetch_assoc();
                array_push($returnValue, new DBReview($row));
            }

            return $returnValue;
        }

        // No data was pulled from the database
        return null;
    }

    /*  Deze functie vraagt informatie op uit de database, daarna zet hij deze data om in een array van orders
     *  String-$query staat voor de query die uitgevoerd word op de database
     *  Deze functie returned een array van reviews
     *  Deze functie word uitgevoerd door de gebruiker zelf
     */
    public static final function queryOrders($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if(is_null($data))
            return null;

        $rowAmount = $data->num_rows;

        if($rowAmount > 0)
        {
            $returnValue = array();

            // Construct the return value of bike[]
            for($i = 0; $i < $rowAmount; $i++)
            {
                $row = $data->fetch_assoc();
                array_push($returnValue, new DBOrder($row));
            }

            return $returnValue;
        }

        // No data was pulled from the database
        return null;
    }
}

?>