<div class="row" id="header_nav">
    <div class="col-lg-6"></div>
    <div class="col-lg-1 text-center">
        <button type="button" class="btn btn-link">Help</button>
    </div>
    <div class="col-lg-2 text-center">
        <button type="button" class="btn btn-link">Over ons</button>
    </div>
    <div class="col-lg-1 text-center">
        <button type="button" class="btn btn-link">Contact</button>
    </div>
    <div class="col-lg-2 text-center">
        <button type="button" class="btn btn-link" data-toggle="modal" data-target=".login-modal">Login/Registeren</button>
<!--        hier moet de login form komen-->
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h1 id="header_logo">FietsShop</h1>
    </div>
    <div class="col-lg-10 col-auto" id="header_SearchAndButton">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Catogorieën
                </button>
                <div class="dropdown-menu">
                    <!--                      Deze zullen moeten gegenereerd worden van de databases-->
                    <a class="dropdown-item" href="#">Mannen</a>
                    <a class="dropdown-item" href="#">Vrouwen</a>
                    <a class="dropdown-item" href="#">Kinderen</a>
                </div>
            </div>
            <input type="text" class="form-control" id="SearchInput" aria-label="Text input with dropdown button">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="SearchButton"><i class="material-icons">search</i></button>
            </div>
        </div>

    </div>
</div>
<div class="row border" id="header_Bottom">
    <div class="col-lg-2 border text-center">
        <button type="button" class="btn btn-link">Thuis</button>
    </div>
    <div class="col-lg-2 border text-center">
        <button type="button" class="btn btn-link">Fietsen</button>
    </div>
    <div class="col-lg-2 border text-center">
        <button type="button" class="btn btn-link">Mijn profiel</button>
    </div>
    <div class="col-lg-2 border text-center">
        <button type="button" class="btn btn-link">Over ons</button>

    </div>
    <div class="col-lg-3 border"></div>
    <div class="col-lg-1 border">
        <div class="dropdown">
            <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="row">
                    <div class="col-lg-6">
                        <span class="badge badge-light" id='CartItemCount'>0</span>
                    </div>
                    <div class="col-lg-6">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                </div>
            </button>
            <div class="dropdown-menu">
                <h1>shopping cart goes here i guess</h1>
            </div>
        </div>
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


