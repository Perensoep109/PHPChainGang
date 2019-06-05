<?php

include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/dbfunctions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/chaingang/private/functions/functions.php");

// Update the session

if(session_status() != PHP_SESSION_ACTIVE)
{
    session_start();
    if(!isset($_SESSION['RECENT_BIKES']))
    {
        $_SESSION['RECENT_BIKES'] = array();
        $_SESSION['CART_BIKES'] = array();
    }
}

?>
<div class="row" id="header_nav">
    <div class="col-lg-6"></div>
    <div class="col-lg-1 text-center">
        <a href="../webpages/HelpPage.php"><button type="button" class="btn btn-link">Help</button></a>
    </div>
    <div class="col-lg-2 text-center">
        <a href="../webpages/AboutPage.php"><button type="button" class="btn btn-link">Over ons</button></a>
    </div>
    <div class="col-lg-1 text-center">
        <a href="../webpages/ContactPage.php"><button type="button" class="btn btn-link">Contact</button></a>
    </div>
    <div class="col-lg-2 text-center">
        <button type="button" class="btn btn-link" data-toggle="modal" data-target=".login-modal">Login/Registeren</button>
    <!--hier moet de login form komen-->
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <a href="../webpages/HomePage.php" class="no_link_dec"><h1 id="header_logo">FietsShop</h1></a>
    </div>
    <div class="col-lg-10 div_searchBar" id="header_SearchAndButton">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Categorieën
                </button>
                <div class="dropdown-menu">
                    <a class='dropdown-item' href='#'>Mannenfietsen</a><hr>
                    <a class='dropdown-item' href='#'>Vrouwenfietsen</a> <hr>
                    <a class='dropdown-item' href='#'>Kinderfietsen</a> <hr>
                </div>
            </div>
            <input type="text" class="form-control" id="SearchInput" aria-label="Text input with dropdown button">
            <div class="input-group-append">
                <a href="CategoriePage.php?query=DavidMoetDitNogEvenFixenOokInDeFooter" type="button" class="btn btn-outline-secondary" type="button" id="SearchButton"><i class="material-icons">search</i></a>
            </div>
        </div>

    </div>
</div>
<div class="row border" id="header_Bottom">
    <div class="col-lg-2 border text-center">
        <a href="../webpages/HomePage.php"><button type="button" class="btn btn-link">Thuis</button></a>
    </div>
    <div class="col-lg-2 border text-center">
        <a href="../webpages/CategoriePage.php"><button type="button" class="btn btn-link">Fietsen</button></a>
    </div>
    <div class="col-lg-2 border text-center">
        <a href="../webpages/ProfilePage.php"><button type="button" class="btn btn-link">Mijn profiel</button></a>
    </div>
    <div class="col-lg-2 border text-center">
        <a href="../webpages/AboutPage.php"><button type="button" class="btn btn-link">Over ons</button></a>
    </div>

    <div class="col-lg-3 border"></div>
    <div class="col-lg-1 border">
        <a href="../webpages/CartPage.php">
            <button class="btn">
                <div class="row">
                    <div class="col-lg-6">
                        <span class="badge badge-light" id='CartItemCount'><?php echo "" . (isset($_SESSION['CART_BIKES']) ? sizeof($_SESSION['CART_BIKES']) : "0"); ?></span>
                    </div>
                    <div class="col-lg-6">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                </div>
            </button>
        </a>
    </div>

<!--    hieronder is de login form model-->
    <div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/login.php"?>
                <?php include_once "$_SERVER[DOCUMENT_ROOT]/chaingang/static/register.php"?>

                </div>
            </div>
                </div>
        </div>
    </div>


