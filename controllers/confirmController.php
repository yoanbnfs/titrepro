<?php
include_once '../models/dataBase.php';
include_once '../models/users.php';
$toConfirm = new users();

$toConfirm->id = $_GET['id'];
$token = $_GET['token'];

session_start();

$toConfirm->getUserByToken();

if ($toConfirm && $toConfirm->confirmation_token == $token) {
        
    $toConfirm->setConfirmedUser();
    
    $_SESSION['auth'] = $toConfirm->id;
    
    header('location: account.php');

} else {
    $_SESSION['falsh']['danger'] = 'Ce token n\'est plus valide';
    header('location: login.php');
}  
