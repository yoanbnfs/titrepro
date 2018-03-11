<?php
include_once '../models/dataBase.php';
include_once '../models/users.php';
$profil = new users();
if(isset($_GET['userId'])){
    $profil->id = $_GET['userId'];
    $profilFounded = $profil->getUserById();
}
