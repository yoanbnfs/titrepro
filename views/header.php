<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['PHP_SELF'] == '/index.php') {
    include_once 'controllers/headerFeatures.php';
    include_once 'controllers/userRegController.php';
    include_once 'controllers/userLoginController.php';            

} else {
    include_once '../controllers/headerFeatures.php';
    include_once '../controllers/userRegController.php';
    include_once '../controllers/userLoginController.php';            
}
?>  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre pro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/lib/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/header.css">
        <link rel="stylesheet" href="../assets/css/register.css">
        <?php
        if ($_SERVER['PHP_SELF'] == '/views/account.php'){
            ?><link rel="stylesheet" href="../assets/css/account.css"><?php
        } ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="navbar">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!--COL principale-->            
                        <div id="top-header" class="row">
                            <div id="brand-section" class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
                                <h1>Brand</h1>
                                <h2 id="h2-legend">Partage, Entraide, Humanité</h2>
                            </div>
                            <div id="menu-container" class="col-lg-3 col-md-5 col-sm-8 col-xs-12">
                                <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"><i class="fas fa-bars"></i></button><!--Bouton pour le menu mobile-->
                                <nav id="menu" class="collapse navbar-collapse"><!--Menu Collapse-->
                                    <ul class="nav navbar-nav">
                                        <li class="menu-items"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                        <li class="menu-items"><a href="#"><i class="fas fa-map-marker"></i> Projets en cours</a></li>
                                        <li class="menu-items"><a href="#"><i class="fas fa-comment"></i> Contact</a></li>
                                    </ul>                        
                                </nav>
                            </div>                       
                            <div id="button-group" class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                                <form class="navbar-form" action="#" method="POST">
                                    <input id="search-bar" type="search" class="form-control" name="searchbar" />
                                    <button id="search-button" type="submit" class="btn btn-default dropdown-toggle"><i class="fa fa-search"></i></button>
                                </form>
                                <div id="search-result" class="dropdown-menu"></div>
                            </div>
                            <div id="session-connect" class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                            <?php
                            if (isset($_SESSION['auth'])){ ?>
                                <a href="../views/account.php" name="account-button" class="registration-link"><i class="fas fa-user-circle"></i>Profil</a>
                                <a href="../views/logout.php" name="logout-button" class="registration-link"><i class="fas fa-user-circle"></i>Déconnection</a>
                                <?php
                            } else {
                             ?>
                                <a name="registration-button" class="registration-link" data-toggle="modal" data-target="#registration"><i class="fas fa-lock"></i> Inscription</a>
                                <a type="button" name="login-button" class="registration-link" data-toggle="modal" data-target="#login"><i class="fas fa-key"></i> Connexion</a>
                                <?php                                       
                                include_once 'userRegistration.php'; 
                                include_once 'userLogin.php';?>
                            <?php } ?>                
                            </div>                                    
                        </div>               
                    </div>
                </div>    
            </div>
            <div id="content">
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
