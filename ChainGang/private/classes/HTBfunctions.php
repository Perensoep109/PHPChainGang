<?php

class HTB
{
    public static function BuildReview($dbReview)
    {
        echo "<ul class='list-unstyled'> <hr>";
        foreach ($dbReview as $item) {
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

    public static function BuildCarousel($bikes)
    {
        $count = 0;
        echo "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>";
        echo "<ol class=\"carousel-indicators\">";
        foreach($bikes as $count => $bike)
        {
            if($count == 0){
                echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>";
            }
            else
            {
                echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"". $count."\"></li>";
            };
        };
            echo"
        </ol>
        <div class='carousel-inner'>";
        foreach($bikes as $count => $item){
            echo "<div class='carousel-item " . ($count == 0 ? 'active' : '') . "'>"
               ?>
                <div class='home_carousel'>
                    <div class='row'>
                        <div class='col-lg-6 home_carousel_left'>
                            <img class='home_carousel_image' src='../../public/images/cat1.jpg'>
                        </div>

                        <div class='col-lg-6 home_carousel_right'>
                            <div class='row'>
                                <h1 class='home_carousel_fiets_naam'> <?php $item->getName() ?></h1>
                            </div>

                            <div class='row home_carousel_fiets_omschijving'>
                                <?php $item->getDescription() ?>
                            </div>

                            <div class='row'>
                                <button type='button' class='btn btn-primary'>Omschijving</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>;
            <?php
        }
        echo "</div>
        </div>";
    }
public static function BuildDropDownMenu($items){
        foreach($items as $item){
            echo "<a class=\"dropdown-item\" href=\"#\">".$item->getName()."</a> <hr>";
        }
}
}