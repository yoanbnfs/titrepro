<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/lib/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <title>Titre pro</title>
    </head>
    <body>
        <?php include 'header.php';?>
        <form class="registration-form" action="#" method="POST">
            <fieldset class="login form-inputs">
                <legend>Informations de connexion</legend>
                <div id="mail-control">
                    <label class="form-labels" for="mail">Adresse e-mail</label>
                    <input class="form-input" type="text" name="mail" placeholder="nom@domaine.fr" />
                </div>
                <div id="password-control">
                    <label class="form-labels" for="password">Mot de passe</label>
                    <input class="form-input" type="password" name="password" placeholder="8 cractères minimum" />
                </div>
                <p><i id="show-password" class="fas fa-eye"></i>Voir le mot de passe</p>
            </fieldset>   
            <fieldset id="civil-status row">
                <legend>Etat Civil</legend>
                <div id="lastname-control">
                    <label class="form-labels" for="lastname">Nom</label>
                    <input class="form-input" type="text" name="lastname" placeholder="Nom de famille" />                                        
                </div>
                <div id="firstname-control">
                    <label class="form-labels" for="lastname">Prénom</label>
                    <input class="form-input" type="text" name="firstname" placeholder="Prénom" />                                        
                </div>
                <label class="form-labels" for="birthdate">Date de naissance</label>
                <input class="form-input" id="datepicker" type="date" name="birthdate" data-toggle="datepicker"/>
            </fieldset>
            <div id="validation-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Valider</button>                                    
            </div>
        </form>
    </body>
</html>


