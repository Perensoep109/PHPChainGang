<?php

include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php";

$frameType = ((isset($_GET['frametype']) && $_GET['frametype'] != "") ? " BIKE_FRAMETYPE = '" . $_GET['frametype'] . "'  AND " : "");
$minPrice = ((isset($_GET['laagsteprijs']) && $_GET['laagsteprijs'] != "") ? " BIKE_PRICE > '" . $_GET['laagsteprijs'] . "'  AND " : "");
$maxPrice = ((isset($_GET['hoogsteprijs']) && $_GET['hoogsteprijs'] != "") ? " BIKE_PRICE < '" . $_GET['hoogsteprijs'] . "'  AND " : "");
$brand = ((isset($_GET['merkfiets']) && $_GET['merkfiets'] != "") ? " BIKE_BRAND = '" . $_GET['merkfiets'] . "'  AND " : "");
$limit = ((isset($_GET['limit']) && $_GET['limit'] != "") ? $_GET['limit'] : 20);

$query = "SELECT * FROM allbikes WHERE " . $frameType . $minPrice . $maxPrice . $brand . " LIMIT " . $limit;

if(strpos($query, "AND") == false)
    $query = "select * from allbikes LIMIT " . $limit;
else
{
    $pos = strrpos($query, "AND");
    $query = substr_replace($query, '', strrpos($query, "AND"), 3);
}

DBI::$logError = false;
$dbBikes = DBI::queryBikes($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>FietsShop</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <!--include header-->
    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php" ?>

    <!--include database functions-->

    <div class="row">
        <div id="cat_sidebar col-lg-3">
            <h3 class="cat_hz_spacing">Filters</h3>
            <form action="" method="get">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">Filter!</button>
                <br><br>

                <h5>Frametype</h5>

                <input type="radio" name="frametype" value="heren"> Herenfietsen<br>
                <input type="radio" name="frametype" value="dames"> Damesfietsen<br>
                <input type="radio" name="frametype" value="lage instap"> Kinderfietsen<br>

                <h5>Merk</h5>

                <input type="radio" name="merkfiets" value=""> Alles<br>
                <input type="radio" name="merkfiets" value="Gazelle"> Gazelle<br>
                <input type="radio" name="merkfiets" value="Giant"> Giant<br>
                <input type="radio" name="merkfiets" value="Pegasus"> Pegasus<br>
                <input type="radio" name="merkfiets" value="Cortina"> Cortina<br><br>

                <h5>Prijs</h5>
                Van:<br>
                €<input type="number" name="laagsteprijs" min="20" max="2000"><br>
                Tot:<br>
                €<input type="number" name="hoogsteprijs" min="20" max="2000"><br>
                Limit:<br>
                ‏‏‎ ‏‏‎‎  ‏‏‎‏‏‎<input type="number" name="limit" min="1" max="40">

            </form>
        </div>
        <div class="col-lg-1 cat_vc_ruler">
        </div>
        <div class="col-lg-8">

            <h2 class="cat_hz_spacing">Fietsen</h2>
            <div class="row">

                <?php

                if($dbBikes != null)
                {
                    foreach ($dbBikes as $fiets) {
                        ?>

                        <div class="col-lg-4 cat_hz_spacing">
                            <?php
                            HTB::BuildBike($fiets);
                            ?>
                        </div>
                    <?php }
                }
                else
                {
                    echo "Er zijn geen resultaten terug gekomen uit uw zoekfunctie";
                }
                ?>

            </div>

        </div>

    </div>


    <?php /*** include footer*/
    include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/footer.php" ?>
</div>


<!--JQuery JS includes-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>