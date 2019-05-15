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
    <div class='row'>
    <div class='col-lg-2'>
    <h5>" . $user[0]->getName() . "</h5>
</div>
<div class='col-lg-6'></div>
    <div class='col-lg-2'>
    <h5>" . date("Y/m/d",strtotime($item->getTimePlaced())) . "</h5>
</div>
      <div class='row'>
      <div class='col-lg-12'>
            <div class='bubble'>" . $item->getText() . "</div>
</div>

</div>
      
</div>
      
      
    </div>
  </li>
  <hr>";
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