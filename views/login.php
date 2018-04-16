<?php 
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
        <link rel="stylesheet" href="../assets/css/login.css">
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'header.php'; ?>
            
        </div>
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">            
            <div class="panel panel-success" id="panel">
                <div class = "panel-heading">
                    <h5 id = "login-title">Connexion</h5>
                </div>
                <div class = "modal-body">
                    <form class = "login-form" action = "#" method = "POST">
                        <div id="mail-control">
                            <label class = "form-labels" for = "mail-connect">Adresse e-mail</label>
                            <input class = "form-input" type = "text" name = "mail-connect" placeholder = "nom@domaine.fr" />                            
                        </div>
                        <div id="password-control">
                            <label class = "form-labels" for = "password-connect">Mot de passe</label>
                            <input class = "form-input" type = "password" name = "password-connect" placeholder = "8 cractères minimum" />
                        </div>
                        <div id = "validation-group">
                            <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Annuler</button>
                            <button type = "submit" id = "submit" name = "submit" class = "btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>                                    
            </div>
        </div>
        <?php include 'footer.php';?>
    </body>
</html>



