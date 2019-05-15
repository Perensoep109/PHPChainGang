<?php

class Review
{
    public function __construct($dbReview)
    {
        echo "<ul class='list-unstyled'>";
        foreach ($dbReview as $item) {
            $user = DBI::queryUsers('select * from allusers WHERE USER_ID = ' . $item->getUserID());
            echo "<li class='media'>
<img src='/chaingang/public/images/UserTEMP.png' class='mr-3 img-thumbnail user-icon'>
    <div class='media-body'>
      <h5 class='mt-0 mb-1'>" . $user[0]->getName() . "</h5>
      <div class='bubble'>".$item->getText()."</div>
      
    </div>
  </li>";
        }


        echo "</ul>";
    }
}/*
 * class review
 *      $dbReview;
 *
 *      constructor(review)
 *          $dbReview = review;
 *
 *
 * for()
 * {
 *  new review($dbreview);
 * }
 */