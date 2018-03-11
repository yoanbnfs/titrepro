<?php
include 'header.php';
include '../controllers/userProfilController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre Pro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/lib/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/header.css">
        <link rel="stylesheet" href="../assets/css/register.css">
    </head>
    <body>
        <div class="row">
            <div class="col-lg-12-col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-4 thumbnail">
                    <i class="fas fa-user-circle fa-9x" style="float:left; padding-right:5%;"></i>
                    <p>Nom : <?= $profilFounded->lastname ?></p>
                    <p>Prénom : <?= $profilFounded->firstname ?></p>
                    <p>Age : <?= $profilFounded->birthdate ?></p>
                    <p>Adresse mail : <?= $profilFounded->mail ?></p>
                </div>
                <div class="col-lg-4 thumbnail">
                    <h3>Accomplissement</h3>                    
                </div>
            </div>            
        </div>        
    </body>
</html>
