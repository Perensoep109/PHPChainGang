<?php
/**
 * Created by PhpStorm.
 * User: Wiebe
 * Date: 10/05/2019
 * Time: 14:31
 */
// Includes
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");

// Query bikes
DBI::$logError = true;
if(isset($_GET['ID']))
    $bike = DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID = " . $_GET['ID'])[0];
else
    $bike = DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID = 1")[0];

if($bike == null)
    header("Location: errorpage.php");
?>

<html>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FietsShop</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--Include header here-->

    <!--Page-->
    <div class="container">
        <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/header.php"?>

        <?php echo "<h2><b>" . $bike->getName() . "</b></h2>"?>
        <div class="row mb-lg-4">
            <?php
            // Prepare variables
            $imagePaths = $bike->getImagePaths();
            $imageAmount = count($imagePaths);

            // Fiets image carousel
            if($imagePaths[0] != "")
            {
            ?>
                <div id="mainFietsCarousel" class="col-lg-8 lg-mr-5">
                    <div id="fietsCarousel" class="carousel slide" data-ride="carousel">
                        <?php
                        if($imageAmount > 6)
                            $imageAmount = 6;

                        if($imageAmount > 0)
                        {
                            // Place indicators
                            echo "<ol class='carousel-indicators'>";

                            for ($i = 0; $i < $imageAmount; $i++)
                                echo "<li data-target='#fietsCarousel' data-slide-to='$i'" . ($i == 0 ? "class='active'" : "") . "></li>";
                            echo "</ol>";

                            // Place images
                            echo "<div class='carousel-inner'>";
                            for ($i = 0; $i < $imageAmount; $i++)
                            {
                                $path = "../" . $imagePaths[$i];

                                echo ($i == 0 ? "<div class='carousel-item active'>" : "<div class='carousel-item'>");
                                echo "<img class='d-block w-100' src='$path' alt='Dit plaatje kon niet worden geladen :('>";
                                echo "</div>";
                            }

                            if($imageAmount > 1)
                            {
                                // Als er meer dan 1 plaatje voor dit product bestaat & ingeladen is, voeg de browse knoppen toe
                                ?>
                                <a class="carousel-control-prev" href="#fietsCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#fietsCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <?php
                            }
                        }

                        echo "</div>";
                        ?>
                    </div>
                </div>
            <?php
            }
            else
            {
                // Geen plaatjes zijn gevonden. Display blobvis
                echo "<img class='col-lg-8' src='../images/blobvis.jpg'>";
            }
            ?>

            <div id="specifications" class="col-lg-4">
                <div id="spec-column" class="row mb-lg-5">
                    <table class="table table-bordered col-lg-12 mb-lg-3">
                    <?php
                    echo "<tr>
                            <th colspan='2'><h3><b>Specificaties<b><h3></th>
                          </tr>
                          <tr>
                            <td>Merk</td>
                            <td>" . $bike->getBrand() . "</td>
                          </tr>
                          <tr>
                            <td>Categorie </td>
                            <td> " . $bike->getCategory() . " </td>
                          </tr>
                          <tr>
                            <td>Jaartal </td>
                            <td> " . $bike->getReleaseYear() . " </td>
                          </tr>
                          <tr>
                            <td>Frametype </td>
                            <td> " . $bike->getFrameType() . " </td>
                          </tr>
                          <tr>
                            <td>Material </td>
                            <td> " . $bike->getMaterial() . " </td>
                          </tr>
                          <tr>
                            <td>Color </td>
                            <td> " . $bike->getColor() . " </td>
                          </tr>";
                    ?>
                    </table>

                    <div class="row col-lg-12">
                        <p class="detail_priceTag col-lg-12">€<?php echo $bike->getPrice() ?>,-</p>
                        <a href="CartPage.php?add=<?php echo $bike->getDbIndex(); ?>" class="btn btn-primary btn-lg text-center">Koop</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div id="module" class="col-lg-8">
                <h3><b>Omschrijving</b></h3>

                <p class="collapse" id="collapseExample" aria-expanded="true"><?php echo $bike->getDescription();?></p>
                <a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></a>
            </div>
            <div id="recentbikes" class="col-lg-4">
                <h3><b>Recent bekeken fietsen</b></h3>
                <?php

                // Lees de hoeveelheid bekeken fieten en bereid de query voor.
                $amount = sizeof($_SESSION['RECENT_BIKES']);

                if($amount > 0)
                {
                    $indexes = implode(',', $_SESSION['RECENT_BIKES']);
                    $recentBikes = DBI::queryBikes("SELECT * FROM allbikes WHERE BIKE_ID IN ($indexes)");

                    // Zet ze om naar klikbare HTML
                    if ($recentBikes != null) {
                        foreach ($recentBikes as $key => $value) {
                            $href = "DetailPage.php?ID=" . $value->getDbIndex();
                            $element = $value->getName();
                            echo "<a href='$href'>$element</a><br>";
                        }
                    }
                }
                ?>
            </div>
        </div>
        <!--Include footer here-->
        <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/footer.php"?>
    </div>

    <!--JQuery JS includes-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(!in_array($bike->getDbIndex(), $_SESSION['RECENT_BIKES']))
    {
        // Add this bike to the recently viewed bikes
        $arrLength = count($_SESSION['RECENT_BIKES']);                             // Count how much bikes are recently viewed

        if($arrLength > 3)                                                         // If more than 3 bikes are recently viewed, start shrinking back to 4
        {
            array_pop($_SESSION['RECENT_BIKES']);                           // Destroy last element in the array
            array_unshift($_SESSION['RECENT_BIKES'], $bike->getDbIndex());  // Place the bike on this page, on the first position of the array
        }
        else
        {
            array_unshift($_SESSION['RECENT_BIKES'], $bike->getDbIndex());  // The array is not full enough, place this bike on the first spot in the array
        }
    }
?>
