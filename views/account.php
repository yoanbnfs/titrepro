<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre pro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/lib/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/header.css">
        <link rel="stylesheet" href="../assets/css/register.css">
    </head>
    <body>
        <?php include 'header.php'?>
        <h2>Votre Compte</h2>
    </body>
</html>



