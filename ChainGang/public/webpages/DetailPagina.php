<html>
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

$bike = DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID = 0")[0];
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <!--Include header here-->
    <?php include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php")?>
    <!--Page-->
    <div class="container" style="width: 1000px;">
        <h1></h1>
        <div class="row">
            <div id="carrousel" class="col-lg-8">
                <h1>Carrousel</h1>
            </div>
            <div id="specifications" class="col-lg-4">
                <h1>Product specificaties</h1>
            </div>
        </div>
        <div class="row">
            <div id="description" class="col-lg-8">
                <h1>Omschrijving</h1>
            </div>
            <div id="recommendations" class="col-lg-4">
                <h1>Misschien wilt u ook</h1>
            </div>
        </div>
    </div>

    <!--Include footer here-->


    <!--JQuery JS includes-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
