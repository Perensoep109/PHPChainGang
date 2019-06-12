<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 10/05/2019
 * Time: 14:31
 */
// Includes
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");

DBI::$logError = true;

if(session_status() != PHP_SESSION_ACTIVE)
{
    session_start();
    if(!isset($_SESSION['RECENT_BIKES']))
    {
        $_SESSION['RECENT_BIKES'] = array();
        $_SESSION['CART_BIKES'] = array();
        $_SESSION['loggedin'] = false;
        $_SESSION['id'] = null;
        $_SESSION['username'] = null;
    }
}

$dbIndex = $_SESSION['id'];

$user = null;
if($dbIndex != null)
    $user = DBI::queryUsers("SELECT * FROM allusers WHERE USER_ID = $dbIndex ")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FietsShop</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php"?>

        <?php
        if($user != null)
        {

            echo "
            <h2><b>Mijn profiel</b></h2>

    <div id-='profiel' class='col-lg-4'>
        <p>Profiel foto:</p>
            ";
        echo "<img class='d-block w-100' src='../images/cat3.jpg'>" ?>
        <table>
            <?php
            echo "
                          <tr>
                            <td>Voornaam: </td>
                            <td>" . $user->getName() . "</td>
                          </tr>
                          <tr>
                            <td>Gebruikersnaam: </td>
                            <td> " . $user->getUsername() . " </td>
                          </tr>
                          <tr>
                            <td>Email: </td>
                            <td> " . $user->getEmail() . " </td>
                          </tr>
                          <tr>
                            <td>Leeftijd: </td>
                            <td> " . $user->getAge() . " </td>
                          </tr>
                          <tr>
                            <td>Gender: </td>
                            <td> " . $user->getGender() . " </td>
                          </tr>
                          <tr>
                            <td>Wachtwoord:</td>
                            <td> " . $user->getPassword() . " </td>
                          </tr>";


            ?>
        </table>
    <hr>
    <div class="table-no-top">
        <h1>Bestellingen</h1>
<?php

$orders = DBI::queryOrders("SELECT * FROM allorders WHERE ORDER_USER_ID = $dbIndex ");
if($orders != null)
{
    $orderAmount = count($orders);
}
else
    {
        echo "Er zijn nog geen bestellingen";
    }
    if($orders != null)
    {
        echo "<table border='1 collapse' >";
        echo "<thead class='bg-secondary'> <tr> <th class='cellWidth'>Order ID</th> <th class='cellWidth'>Fiets</th><th class='cellWidth'>Fiets prijs</th> <th class='cellWidth'>Order status</th><th class='cellWidth'>Adress</th> <th class='cellWidth'>Postcode</th> <th class='cellWidth'>Besteld op</th></tr> </thead>";


        for($i = 0; $i < $orderAmount; $i++)
        {
            $order = $orders[$i];
            $fietsen = $order->getBikeArr();

            if($fietsen == null)
                continue;

            $fietsAmount = count($fietsen);

            for($j = 0; $j < $fietsAmount; $j++)
            {
                $fiets = $fietsen[$j];
                echo "<tr class='bg-light'>" . "<td class='cellWidth'>" . $order->getDbIndex() . "</td>" . "<td class='cellWidth'>" . $fiets->getName() . "</td>"."<td class='cellWidth'>" . "€" . $fiets->getPrice()."</td>" . "<td class='cellWidth'>" . $order->getState() . "</td>" . "<td class='cellWidth'>" . $order->getStreetname() . $order->getAdresNumber() . "</td>" . "<td class='cellWidth'>" . $order->getPostCode() . "</td>" . "<td class='cellWidth'>" . $order->getDate() . "</td>";
            }
        }
            echo "</table>";
    }
    }
    else
    {
        echo "Er is nog geen profiel beschikbaar";
    }
?>
    </div>
    </div>
<?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/footer.php"?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
