<?php
function strposX($string, $char, $number)
{
    if($number == 1)
        return strpos($string, $char);

    else if($number > 1)
    {
        $pos = 0;

        for($i = 0; $i < $number; $i++)
        {
            $pos = strpos($string, $char, $pos + 1);
        }
        return $pos;
    }
    else
        return -1;
}

class HTB
{
    public static function BuildBike($fiets)
    {
        ?>
        <div class="card cardbike">
            <a href="DetailPage.php?ID=<?php echo $fiets->getDbIndex()?>">
                <img class="card-img-top" src="<?php echo "../" . $fiets->getImagePaths()[0] ?>" alt="Card image cap">
            </a>
            <div class="card-body">
                <h5 class="card-title cardbike_nodeco"><?php echo $fiets->getName() ?></h5>
                <p class="card-text cardbike_price">&euro;<?php echo $fiets->getPrice() ?></p>
                <p class="card-text">
                    <b>Omschrijving: </b><?php echo $string = substr($fiets->getDescription(), 0, 75); ?>
                    <a href="DetailPage.php?ID=<?php echo $fiets->getDbIndex()?>"> ...read more</a></p>
            </div>
        </div>
        <?php
    }

    public static function BuildReviews($dbReviews)
    {
        if(sizeof($dbReviews) > 0 ){


        echo "<ul class='list-unstyled'>";
        foreach ($dbReviews as $item) {
            $user = DBI::queryUsers('select * from allusers WHERE USER_ID = ' . $item->getUserID());
            echo "
        <li class='media'>
            <div class='media-body'>
                <div class='row'>
                    <div class='col-lg-2'>
                        <img src='/chaingang/public/images/users/" . $user[0]->getImage() . "' class='mr-3 img-thumbnail user-icon'>
                    </div>
                    <div class='col-lg-10'>
                        <div class='row'>
                            <div class='col-lg-2'>
                                <h5>" . $user[0]->getName() . "</h5>
                            </div>
                            <div class='col-lg-7'></div>
                            <div class='col-lg-1 mx-auto'>
                                " . date("Y/m/d", strtotime($item->getTimePlaced())) . "
                            </div>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='bubble'>" . $item->getText() . "
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <hr>";
        } echo "</ul>";
    }
    }

    public static function BuildCarousel($bikes)
    {
        $count = 0;

        echo "
        <div class='row'>

<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
        <ol class='carousel-indicators'>
        ";
        foreach($bikes as $item){
            if($count == 0){
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
            }
            else {
                echo "       <li data-target='#carouselExampleIndicators' data-slide-to='". $count."'></li>";
            };
            $count++;
        };
        $count = 0;
        echo"
        </ol>
        <div class='carousel-inner'>";
        foreach($bikes as $item){
            $desc = substr($item->getDescription(), 0, 600);
            echo"<div class='carousel-item ";
            if($count == 0){
                echo "active";
            };
            echo "'>
                <div class='home_carousel'>
                    <div class='row'>
                        <div class='col-lg-6 home_carousel_left'>
                            <img class='home_carousel_image' src='/chaingang/public/".$item->getImagePaths()[1] ."' >
                        </div>
                        <div class='col-lg-6 home_carousel_right'>
                            <div class='row'>
                                <h1 class='home_carousel_fiets_naam'>" .$item->getName()."</h1>
                            </div>
                            
                            <div class='row home_carousel_fiets_omschijving'>
                                ".$desc."
                            </div>
                            <div class='row '>
                            <div class='col-4'>
                                <a href='DetailPage.php?ID=". $item->getDbIndex(). "' type='button' class='btn btn-primary btn-block'>Details</a>
                                </div>
                                <div class='col-8 text-left'>
                                ";
            if($item->getOnSale() == true)
            {
                echo "<h3> Van €". $item->getPrice() ." voor €" . $item->getPrice() * 0.80 .   "</h3>";
            }
            else{
                echo "<h3>€" . $item->getPrice(). "</h3>";
            }

            echo" </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            $count++;
        }
        echo "</div>
    </div>
    </div>";
    }
}
?>