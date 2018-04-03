<?php
function noLogged(){
    if (!isset($_SESSION['auth'])){
        header('location: login.php');
        exit();
    }
}

