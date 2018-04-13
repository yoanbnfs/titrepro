<?php

if ($_SERVER['PHP_SELF'] == '/index.php') {
    include_once 'models/dataBase.php';
    include_once 'models/users.php';
} else {
    include_once '../models/dataBase.php';
    include_once '../models/users.php';
}
$connectedUser = new users();
if (isset($_POST['submit-connect'])) {
    if (!empty($_POST['mail-connect']) && !empty($_POST['password-connect'])) {

        $connectedUser->mail = $_POST['mail-connect'];

        if ($connectedUser->connectUser()) {
            if (password_verify($_POST['password-connect'], $connectedUser->password)) {
                if ($connectedUser->getUserByMail()){
                    $_SESSION['auth']['id'] = $connectedUser->id;
                    $_SESSION['auth']['confirmed_at'] = $connectedUser->confirmed_at;
                    $_SESSION['auth']['mail'] = $connectedUser->mail;
                    $_SESSION['auth']['password'] = $connectedUser->password;
                    $_SESSION['auth']['name'] = $connectedUser->name;
                    $_SESSION['auth']['lastname'] = $connectedUser->lastname;                
                    $_SESSION['auth']['firstname'] = $connectedUser->firstname;                
                    $_SESSION['auth']['birthdate'] = $connectedUser->birthdate;                
                }



                if ($_SERVER['PHP_SELF'] == '/index.php') {
                    header('location: views/account.php');
                    exit();
                } else {
                    header('location: account.php');
                    exit();
                }
            } else {
                $_SESSION['flash']['danger'] = 'L\'identifiant ou le mot de passe saisi est incorrect';
            }
        } else {
            $_SESSION['flash']['danger'] = 'L\'identifiant ou le mot de passe saisi est incorrect';
        }
    } else {
        $_SESSION['flash']['danger'] = 'Veuillez remplir tous les champs';
    }    
}