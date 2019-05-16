<?php

class HTB
{
    public static function BuildReview($dbReview)
    {
        echo "<ul class='list-unstyled'> <hr>";
        foreach ($dbReview as $item) {
            $user = DBI::queryUsers('select * from allusers WHERE USER_ID = ' . $item->getUserID());
           echo"
<li class='media'>
    <div class='media-body'>
        <div class='row'>
            <div class='col-lg-2'>
                <img src='/chaingang/public/images/users/".$user[0]->getImage() ."' class='mr-3 img-thumbnail user-icon'>
            </div>
            <div class='col-lg-10'>
                <div class='row'>
                    <div class='col-lg-2'>
                        <h5>" . $user[0]->getName() . "</h5>
                    </div>
                    <div class='col-lg-7'></div>
                    <div class='col-lg-1 mx-auto'>
                        " . date("Y/m/d",strtotime($item->getTimePlaced())) . "
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
        }


        echo "</ul>";
    }
}