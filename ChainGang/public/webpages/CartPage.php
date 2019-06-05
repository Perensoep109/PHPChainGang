<?php
    function buildOrderProduct(DBBike $bike)
    {
        ?>
            <div class='row'>
                <hr class='col-lg-12'>
                <a href='DetailPage.php?ID=<?php echo $bike->getDbIndex() ?>' class='no_link_dec'><img src='../<?php echo $bike->getImagePaths()[0] ?>' class='cart_img_small col-lg-3'></a>
                <a href='DetailPage.php?ID=<?php echo $bike->getDbIndex() ?>' class='no_link_dec'><p class='col-lg-3'><?php echo $bike->getName()?></p></a>
                <p class='col-lg-2'>Deze fiets wordt binnen vier werkdagen geleverd</p>
                <div class="col-lg-2 row">
                    <a class='col-lg-12' href='CartPage.php?rem=<?php echo $bike->getDbIndex() ?>'>Verwijder</a>
                    <a class='col-lg-12' href='DetailPage.php?ID=<?php echo $bike->getDbIndex() ?>'>Details</a>
                </div>
                <p class='col-lg-2 text-right'>€<?php echo $bike->getPrice()?></p>
            </div>
        <?php
    }

    //Update session
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        session_start();
        if(!isset($_SESSION['RECENT_BIKES']))
        {
            $_SESSION['RECENT_BIKES'] = array();
        }

        if(!isset($_SESSION['CART_BIKES']))
        {
            $_SESSION['CART_BIKES'] = array();
        }
    }

    // Includes
    include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");

    if(isset($_GET['rem']))
    {
        //Remove the bike which rem refers to
        $key = array_search($_GET['rem'], $_SESSION['CART_BIKES']);

        unset($_SESSION['CART_BIKES'][$key]);
    }

    //A bike needs to be added to the cart
    if(isset($_GET['add']))
    {
        //Prevent bike duplicates inside array
        if(!in_array($_GET['add'], $_SESSION['CART_BIKES']) && is_numeric($_GET['add']))
            array_push($_SESSION['CART_BIKES'], $_GET['add']);
    }

    //Variables
    $queryBikes = implode(',', $_SESSION['CART_BIKES']);
    $cartBikes = DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID IN ($queryBikes)");
    $totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FietsShop</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php";

    echo "<div class='row'><h1>Winkelwagentje</h1></div>";

    if(isset($cartBikes) && sizeof($cartBikes) > 0)
    {
        foreach ($cartBikes as $bike)
        {
            buildOrderProduct($bike);
            $totalPrice += $bike->getPrice();
        }
    ?>

    <hr class='col-lg-12'>
    <div class="row">
        <p class="col-lg-8"></p>
        <div class="col-lg-4 row">
            <table class="table table-no-top col-lg-12">
                <thead>
                    <tr>
                        <th>Totaal</th>
                    </tr>
                </thead>
                <tr>
                    <td>Totaal artikelen</td>
                    <td>€<?php echo $totalPrice ?></td>
                </tr>
                <tr>
                    <td>Verzendkosten</td>
                    <td>€100</td>
                </tr>
                <tr>
                    <td>Subtotaal</td>
                    <td>€<?php echo $totalPrice + 100 ?></td>
                </tr>
            </table>
            <button type="button" class="btn btn-primary btn-lg col-lg-6"><b><i>Bestel</i></b></button>
        </div>
    </div>
    <?php
    }
    else
    {
        echo "<h2>Er zijn  nog een fietsen in het winkelwagentje</h2>";
    }
    ?>
    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/footer.php"?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>