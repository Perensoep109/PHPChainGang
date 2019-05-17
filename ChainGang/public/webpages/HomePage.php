<!DOCTYPE html>
<html lang="en">
<?php
// Includes
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/classes/HTBfunctions.php");

DBI::$logError = true;

$reviews = DBI::queryReviews("select * from allreviews order by REVIEW_ID desc limit 2");

?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FietsShop</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php";?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="home_carousel">
                    <div class="row">
                        <div class="col-lg-6 home_carousel_left">
                            <img class="home_carousel_image" src="https://via.placeholder.com/400x350?Text=slide1" >
                        </div>
                        <div class="col-lg-6 home_carousel_right">
                                    <div class="row">
                                        <h1 class="home_carousel_fiets_naam">Nieuwe Fietsje</h1>
                                    </div>
                            <div class="row home_carousel_fiets_omschijving">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut euismod urna. Ut hendrerit maximus turpis. Fusce nec justo et est hendrerit vehicula ac sed ex. Phasellus id tincidunt nisl. Nam dictum id sem in porttitor. Mauris elementum dui odio, quis pharetra libero varius quis. Curabitur eu dictum nisl. Sed condimentum elit at sapien consequat dictum. Nam vulputate turpis tellus, non tempus enim finibus ut. Nullam bibendum non dui id fermentum. Sed at elementum enim, sit amet consectetur metus. Vestibulum non accumsan felis. Duis orci purus, mollis pretium leo eu, malesuada placerat sapien. Aliquam interdum pulvinar magna sed tincidunt. Fusce id nulla non odio finibus faucibus. Quisque orci tortor, tristique id neque sed, efficitur posuere ex.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="home_carousel">

                </div>
            </div>
            <div class="carousel-item">
                <div class="home_carousel">

                </div>
            </div>
        </div>
    </div>
    <?php HTB::BuildReview($reviews);?>

    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/footer.php"?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>