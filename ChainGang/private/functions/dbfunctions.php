<?php
/**
 * Created by PhpStorm.
 * DBUser: Wiebe
 * Date: 08/05/2019
 * Time: 11:23
 */

include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/classes/DBBike.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/classes/DBUser.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/classes/DBReview.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/classes/DBOrder.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/classes/DBCate.php");
//include_once("../classes/DBOrder.php");
//include_once("../classes/DBReview.php");
//include_once("../classes/DBUser.php");

/* De DBI class staat voor, Data Base Interface
 * Deze klasse heeft een set aan statische functies, die overal uitgevoerd kunnen worden
 * Deze klasse onderhoud ALLE verbindingen, queries of andere interacties met de database.
 * Als er fietsen, users, reviews of orders opgevraagd worden uit de database, dan word dat automatisch omgezet naar de juiste data type
 * Deze functies zijn van te voren geschreven, zodat iedereen de juiste functies gebruikt, die fatsoenlijk werken. Ten allen tijden.
 */
final class DBI
{
    //===Variables===//
    public static $logError = false;

    //===Functions===//
    /*  Deze functie maakt een connectie met de database
     *  Deze functie word elke keer uitgevoerd als er een query op de database word uitgevoerd
     *  Deze functie returned een object van mysqli
     *  Deze functie word alleen uitgevoerd door deze klasse, elke keer als er een query functie uitgevoerd word
     */
    private static final function makeDBConn()
    {
        $returnVal = new mysqli("localhost", "root", "root", "waken_chaingangfietsen");

        if($returnVal->connect_error)
        {
            if(self::$logError)
                self::logError("ERROR: Connection failed, " . $returnVal->connect_error);

            return null;
        }

        return $returnVal;
    }

    /* Deze functie logt elke error die gegeven word, naar de website als een HTML element
     * String-$error staat voor de error die gelogt moet worden
     * Deze functie word uitgevoerd door query functies ALS $logError true is.
     */
    private static final function logError($error)
    {
        echo "<div class='alert alert-danger' role='alert'>
                <h1 class='errorLog'>$error</h1>
              </div>>";
    }

    /*  Deze functie vraagt informatie op uit de database, daarna zet hij deze data om in een array van orders
     *  String-$query staat voor de query die uitgevoerd word op de database
     *  Deze functie returned alles wat uit de query komt (als er dan ook maar wat uit komt)
     *  Deze functie word uitgevoerd door de gebruiker zelf
     */
    public static final function queryDB($query)
    {
        $dbConn = self::makeDBConn();

        if($dbConn == null)
            // The function crashed with an error, return nothing
            return null;

        $returnVal = $dbConn->query($query);

        if($dbConn->error)
        {
            if(self::$logError)
                self::logError("ERROR: Querying data from DB threw an error: " . $dbConn->error);

            return null;
        }

        return $returnVal;
    }

    /*  Deze functie vraagt informatie op uit de database, daarna zet hij deze data om in een array van bikes
     *  String-$query staat voor de query die uitgevoerd word op de database
     *  Deze functie returned een array van bikes
     *  Deze functie word uitgevoerd door de gebruiker zelf
     */
    public static final function queryBikes($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if($data == null)
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

    /*  Deze functie vraagt informatie op uit de database, daarna zet hij deze data om in een array van users
     *  String-$query staat voor de query die uitgevoerd word op de database
     *  Deze functie returned een array van users
     *  Deze functie word uitgevoerd door de gebruiker zelf
     */
    public static final function queryUsers($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if($data == null)
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

    /*  Deze functie vraagt informatie op uit de database, daarna zet hij deze data om in een array van reviews
     *  String-$query staat voor de query die uitgevoerd word op de database
     *  Deze functie returned een array van reviews
     *  Deze functie word uitgevoerd door de gebruiker zelf
     */
    public static final function queryReviews($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if($data == null)
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
        if($data == null)
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
    /*  Deze functie vraagt informatie op uit de database, daarna zet hij deze data om in een array van bikes
    *  String-$query staat voor de query die uitgevoerd word op de database
    *  Deze functie returned een array van catogorieen
    *  Deze functie word uitgevoerd door de gebruiker zelf
    */
    public static final function queryCategories($query)
    {
        $data = self::queryDB($query);

        // The data could not be pulled from the database
        if($data == null)
            return null;

        $rowAmount = $data->num_rows;

        if($rowAmount > 0)
        {
            $returnValue = array();

            // Construct the return value of bike[]
            for($i = 0; $i < $rowAmount; $i++)
            {
                $row = $data->fetch_assoc();
                array_push($returnValue, new DBCate($row));
            }

            return $returnValue;
        }

        // No data was pulled from the database
        return null;
    }
}

?>