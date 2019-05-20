<?php

include_once "$_SERVER[DOCUMENT_ROOT]/ChainGang/private/classes/DBBike.php";

class BikeProduct
{

    /*
     * aanmaken van een bootstrap cart met data uit DB
     */
    public function __construct(DBBike $fiets)
    {
        //?ID=3
        ?>
            <div class="card cardbike">
                <img class="card-img-top" src="<?php echo "../" . $fiets->getImagePaths()[0] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $fiets->getName() ?></h5>
                    <p class="card-text"><?php echo $fiets->getCategory() ?></p>
                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>

        <?php
    }

}

?>