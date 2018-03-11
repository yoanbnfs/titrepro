<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['PHP_SELF'] == '/index.php') {
    include_once 'controllers/headerFeatures.php';
} else {
    include_once '../controllers/headerFeatures.php';
}
?>  
<div class="row">
    <div class="col-lg-12 col-md-12"><!--COL principale-->
        <div class="navbar navbar-default">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="top-header" class="row">
                        <div id="brand-section" class="col-lg-offset-1 col-lg-3 col-md-offset-0 col-md-3 col-sm-offset-0 col-sm-4 col-xs-12 text-center">
                            <h1>Brand</h1>
                            <h2 id="h2-legend">Partage, Entraide, Humanité</h2>
                        </div>
                        <div id="button-group" class="col-lg-offset-0 col-lg-3 col-md-4 col-sm-6 col-xs-offset-3 col-xs-6">
                            <form class="navbar-form" action="#" method="POST">
                                <input id="search-bar" type="search" class="form-control" name="searchbar" />
                                <button id="search-button" type="submit" class="btn btn-default dropdown-toggle"><i class="fa fa-search"></i></button>
                            </form>
                            <div id="search-result" class="dropdown-menu"></div>
                        </div>
                        <div id="social-networks" class="col-lg-offset-1 col-lg-2 col-md-2 col-sm-2 col-xs-3">
                            <i class="fab fa-twitter icon-spacing"></i>
                            <i class="fab fa-facebook icon-spacing"></i>
                            <i class="fab fa-linkedin icon-spacing"></i>                                                    
                        </div>                       
                        <div id="session-connect" class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <?php include 'userRegistration.php'; ?>
                            <?php include 'userLogin.php'; ?>                
                        </div>                                    
                    </div>
                    <div class="row">
                        <div id="menu-container" class="col-lg-11 col-md-11">
                            <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"><i class="fas fa-bars"></i></button><!--Bouton pour le menu mobile-->
                            <nav id="menu" class="collapse navbar-collapse"><!--Menu Collapse-->
                                <ul class="nav navbar-nav">
                                    <li class="menu-items"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="menu-items"><a href="#"><i class="fas fa-map-marker"></i> Projets en cours</a></li>
                                    <li class="menu-items"><a href="#"><i class="fas fa-comment"></i> Contact</a></li>
                                </ul>                        
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container">
            <?php
            if (isset($_SESSION['flash'])) {
                foreach ($_SESSION['flash'] as $type => $message) {
                    ?><div class="alert alert-<?= $type ?>">
                        <?= $message ?>
                    </div><?php
                }
                unset($_SESSION['flash']);
            }
            ?>
        </div>
    </div>
</div>
