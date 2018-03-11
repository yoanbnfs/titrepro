<?php
if ($_SERVER['PHP_SELF'] == '/index.php') {
    include_once 'models/dataBase.php';
    include_once 'models/users.php';
} else {
    include_once '../models/dataBase.php';
    include_once '../models/users.php';
}
$connectedUser = new users();
$connectErrors = array();
if(isset($_POST['mail-connect']) && isset($_POST['password-connect'])){
    if(!empty($_POST['mail-connect']) && !empty($_POST['password-connect'])){               
        
        
        
    } else {
        $connectErrors['emptyMailConnect'] = "Veuillez remplir tous les champs";
    } 
}

