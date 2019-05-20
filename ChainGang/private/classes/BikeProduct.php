<?php

include_once "$_SERVER[DOCUMENT_ROOT]/ChainGang/private/classes/DBBike.php";

class BikeProduct
{

    /*
     * aanmaken van een bootstrap cart met data uit DB
     */
    public function __construct(DBBike $fiets)
    {
        ?>
        <a href="DetailPage.php" class="cardbike_link">
            <div class="card cardbike">
                <img class="card-img-top" src="<?php echo "../" . $fiets->getImagePaths()[0] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $fiets->getName() ?></h5>
                    <p class="card-text cardbike_price">&euro;<?php echo $fiets->getPrice() ?></p>
                    <p class="card-text">
                        <b>Omschrijving: </b><?php echo $string = substr($fiets->getDescription(), 0, 75); ?><a
                                href="DetailPage.php"> ...read more</a></p>
                </div>
            </div>
        </a>

        <?php
    }

}

?>