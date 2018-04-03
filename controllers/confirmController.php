<?php
include_once '../models/dataBase.php';
include_once '../models/users.php';
$toConfirm = new users();

$toConfirm->id = $_GET['id'];
$token = $_GET['token'];

session_start();

$toConfirm->getTokenById();

if ($toConfirm->confirmation_token == $token) {
        
    $toConfirm->setConfirmedUser();
    if ($toConfirm->getUserById()){
        $_SESSION['auth']['type'] = $toConfirm->userTypes;
        $_SESSION['auth']['id'] = $toConfirm->id;
        $_SESSION['auth']['mail'] = $toConfirm->mail;
        $_SESSION['auth']['confirmed_at'] = $toConfirm->confirmed_at;
        $_SESSION['auth']['password'] = $toConfirm->password;
        if ($toConfirm->userTypes === '1'){
            $_SESSION['auth']['lastname'] = $toConfirm->lastname;
            $_SESSION['auth']['firstname'] = $toConfirm->firstname;
            $_SESSION['auth']['birthdate'] = $toConfirm->birthdate;        
        } else {    
            $_SESSION['auth']['name'] = $toConfirm->name;
            $_SESSION['auth']['subTypes'] = $toConfirm->subTypes;    
        }        
    var_dump($_SESSION);
    }            
    header('location: account.php');
    exit();
} else {
    $_SESSION['flash']['danger'] = 'Ce token n\'est plus valide';
    header('location: login.php');
    exit();
}  