<!DOCTYPE html>
<html lang="en">
<?php
// Includes
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/functions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/functions.php");


DBI::$logError = true;

$reviews = DBI::queryReviews("SELECT * FROM allreviews ORDER BY REVIEW_ID DESC limit 2");
$carousel_bikes = DBI::queryBikes("SELECT * FROM allbikes ORDER BY BIKE_ID DESC limit 3");
$card_bikes = DBI::queryBikes("SELECT * FROM allbikes ORDER BY BIKE_ID DESC limit 8");

?>
<head>
    <meta charset="utf-8" />
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
    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php";?>


<?php HTB::BuildCarousel($carousel_bikes)?>
<hr>
<div class="row nieuwsbrief_div alert alert-secondary">
    <div class="col-lg-4">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Schijf je in voor onze nieuwsbrief</label>
                <input type="email" class="form-control" id="NieuwsBrief_Email" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary container-fluid">Schijf je in</button>
        </form>
    </div>
    <div class="col-lg-8 nieuwsbrief_text">
        <h2>Altijd up-to-date met onze nieuwsbrief!</h2>
    </div>
</div>
    <hr>
    <div class="row mr-lg-3">
    <?php
    foreach ($card_bikes as $item)
    {
        echo "<div class='col-md-3'>";
        HTB::BuildBike($item);
        echo '</div>';
    }?>
    </div>

<div class="row">

    <hr class="col-lg-12">
    <div>
        <img src="https://source.unsplash.com/400x300/?bikes" class="col-lg-4 img-size">
    </div>
    <div class="col-lg-6">


        Al jaren de expert in 2e hands rijwielen. Alles wat u nodig heeft op één plek!
        <br><br><br><br>
        Fiets kopen? FietsShop!
    </div>
    <hr>
</div>
    <hr class="col-lg-12">
    <?php HTB::BuildReview($reviews);?>

    <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/footer.php"?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>