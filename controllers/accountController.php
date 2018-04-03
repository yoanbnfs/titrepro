<?php

include_once '../models/dataBase.php';
include_once '../models/users.php';
include_once '../models/configuration.php';

$account = new users();
$account->id = $_SESSION['auth']['id'];
$myProfil = $account->getTypesById();
$_SESSION['auth']['type'] = $myProfil->type;
$_SESSION['auth']['subType'] = $myProfil->subTypesName;

$updateErrors = array();
if ($_SESSION['auth']['type'] == 'particulier'){
    if (empty($_POST['profil-lastname'])) {
        $updateErrors['emptyLastname'] = 'Veuillez renseigner votre nom de famille';
    } else {
        if (!preg_match(REGTEXT, $_POST['profil-lastname'])) {
            $updateErrors['regLastname'] = 'Votre nom ne doit comporter que des lettres';
        }
    }

    if (empty($_POST['profil-firstname'])) {
        $updateErrors['emptyFirstname'] = 'Veuillez renseigner votre prénom';
    } else {
        if (!preg_match(REGTEXT, $_POST['profil-firstname'])) {
            $updateErrors['regFirstname'] = 'Votre prénom ne doit comporter que des lettres';
        }
    }    
    if (empty($_POST['profil-old'])) {
        $updateErrors['emptyBirthdate'] = 'Veuillez renseigner votre date de naissance';
    } else {
        if (!preg_match(REGDATE, $_POST['profil-old'])) {
            $updateErrors['regBirthdate'] = 'La date doit être au format : jj/mm/aaaa';
        }
    }
} else {
    if (empty($_POST['profil-name'])) {
        $updateErrors['emptyName'] = 'Veuillez renseigner le nom de votre entreprise';
    }    
}



if (empty($_POST['profil-mail'])) {
    $updateErrors['emptyMail'] = 'Veuillez renseigner votre adresse email';
} else {
//            $account->mail = $_POST['profil-mail'];
//            $existingMail = $account->checkUserByMail();
//            $checkMail = intval($existingMail->mail);            
    if (!preg_match(REGMAIL, $_POST['profil-mail'])) {
        $updateErrors['regMail'] = 'E-mail non valide. Exemple : contact@domaine.fr';
    }
//            elseif ($checkMail == 1) {
//                $updateErrors['checkMail'] = 'Cette adresse mail est déjà enregistrée';
//            }
}

if (isset($_SESSION['auth']['mail']) && isset($_SESSION['auth']['password'])) {
    $account->mail = $_SESSION['auth']['mail'];
    $account->password = $_SESSION['auth']['password'];
    if (!empty($_POST['profil-mail']) && count($updateErrors) == 0) {
        $account->mail = $_POST['profil-mail'];
        $_SESSION['auth']['mail'] = $account->mail;
    }
    if (isset($_SESSION['auth']['lastname']) && isset($_SESSION['auth']['firstname']) && isset($_SESSION['auth']['birthdate'])) {
        $account->lastname = $_SESSION['auth']['lastname'];
        $account->firstname = $_SESSION['auth']['firstname'];
        $account->birthdate = $_SESSION['auth']['birthdate'];
        if (!empty($_POST['profil-lastname']) && !empty($_POST['profil-firstname']) && !empty($_POST['profil-old']) && count($updateErrors) == 0) {
            $account->lastname = $_POST['profil-lastname'];
            $account->firstname = $_POST['profil-firstname'];
            $account->birthdate = $_POST['profil-old'];
            $_SESSION['auth']['lastname'] = $account->lastname;
            $_SESSION['auth']['firstname'] = $account->firstname;
            $_SESSION['auth']['birthdate'] = $account->birthdate;
        }
    } elseif (isset($_POST['name'])) {
        $account->name = $_SESSION['auth']['name'];
        if (!empty($_POST['name']) && count($updateErrors) == 0) {
            $account->name = $_POST['profil-name'];
            $_SESSION['auth']['name'] = $account->name;
        }
    }
    $account->updateUser();
    
    
    $_SESSION['flash']['success'] = 'Votre compte a été modifié avec succès';
}
    var_dump($_POST);
    var_dump($_SESSION);
    var_dump($updateErrors);
