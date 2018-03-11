<?php
/*Grâce a PHP_SELF je change les chemins des includes par rapport aux pages sur laquelle je me situe
 * si elles se situes dans dans dossiers differents 
 * ICI 'index.php' se situe a la racine do mon dossier
 * les autres pages se situant dans le dossier views
 */
if ($_SERVER['PHP_SELF'] == '/index.php') {
    include_once 'models/dataBase.php';
    include 'models/users.php';
} else {
    include_once '../models/dataBase.php';
    include '../models/users.php';
}

/*Regexs (Expressions régulières) de sécurisation des champs de formulaires d'inscription/connexion
 *Les regexs sont définies afin de définir un modéle de renseignement des champs inpactés par celles ci 
 */
$regexText = '#^[a-z ÂÊÎÔÛÄËÏÖÜÀÆæÇÉÈŒœÙğéàè_-]+$#i';
$regexEmail = '#^(\w[-._+\w]*\w@\w[-._\w]*\w\.\w{2,3})$#';
$regexDate = '#^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$#';
/**
 * Instanciation d'un nouvel utilisateur dans la class publique 'users'
 */
$user = new users();
/**
 * Création du tableau d'erreur du formulaire d'inscription
 * ce tableau récuperaras champ par champ les erreur définis, si elles sont générées 
 */
$errors = array();
$success = array();
    /**
     * Vérification champ par champ du formulaire d'inscription
     * Les vérification se font en ****** avex $.post 
     */
    //si l'input sélectionné $(this) éxiste ...
    if (isset($_POST['checkInput'])) {

        //et si la correspondance entre la data d'ajax et l'attribut 'name' de l'input ce fait 
        if ($_POST['check'] == 'ajaxlastname') {
            
            if (empty($_POST['checkInput'])) {
                    
                $errors['lastname'] = 'Veuillez renseigner votre nom de famille';
                
            }elseif (!preg_match($regexText, $_POST['checkInput'])) {
                    
                    $errors['lastname'] = 'Votre nom ne doit comporter que des lettres';
            } else {
                $success['lastname'] = 'Ok';
                
            }
            if (!empty($errors['lastname'])) {
                echo json_encode($errors);
            }
        }


        if ($_POST['check'] == 'ajaxfirstname') {
            
            if (empty($_POST['checkInput'])) {
                
                $errors['firstname'] = 'Veuillez renseigner votre prénom';
                
            } elseif (!preg_match($regexText, $_POST['checkInput'])) {
                    
                $errors['firstname'] = 'Votre prénom ne doit comporter que des lettres';
            } else {                
                $success['lastname'] = 'Ok';                
            }           
            if (!empty($errors['firstname'])) {
                echo json_encode($errors);
            }
        }


        if ($_POST['check'] == 'ajaxpassword') {
            if (strlen($_POST['checkInput']) < 8) {
                
                $errors['password'] = 'Votre mot de passe doit comporter 8 caractères minimum';
                
            } else {
                $success['password'] = 'Ok';                
                
            }
            if (!empty($errors['password'])) {
                echo json_encode($errors);
            } 
        }
        

        if ($_POST['check'] == 'ajaxbirthdate') {
            if(empty($_POST['checkInput'])) {
                
                $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
                
            } elseif (!preg_match($regexDate, $_POST['checkInput'])) {
                    
                $errors['birthdate'] = 'La date doit être au format : jj/mm/aaaa';
                
            } else {
                $success['birthdate'] = 'Ok';
            } 
            if (!empty($errors['birthdate'])) {
                echo json_encode($errors);            
            }
        } 


        if ($_POST['check'] == 'ajaxmail') {
            $user->checkUserByMail();
            $existingMail = $user->checkUserByMail();
            $checkMail = intval($existingMail->mail);
            if (empty($_POST['checkInput'])){
                
                $errors['mail'] = 'Veuillez renseigner votre adresse email';
                
            } elseif (!preg_match($regexEmail, $_POST['checkInput'])) {
                    
                    $errors['mail'] = 'E-mail non valide. Exemple : contact@domaine.fr';
                    
            } elseif ($checkMail == 1) {
                
                $errors['mail'] = 'Cette adresse mail est déjà enregistrée';   
                
            } else {
                $success['mail'] = 'Ok';
            } 
            if(!empty($errors['mail'])){
                echo json_encode($errors);            
            }
        }   
    }
if(session_status() == PHP_SESSION_NONE){
    session_start();    
}
if (count($_POST) == 5 && count($errors) == 0) {

            $user->lastname = strip_tags($_POST['lastname']);                    
            $user->firstname = strip_tags($_POST['firstname']);
            $password = $_POST['password'];
            $user->password = password_hash($password, PASSWORD_BCRYPT);                        
            $user->birthdate = strip_tags($_POST['birthdate']);
            $user->mail = strip_tags($_POST['mail']);
            $setToken = password_hash('connection', PASSWORD_BCRYPT);
            $user->confirmation_token = $setToken;
    $user->setUser();
    mail($user->mail, 'Confirmation de votre compte', 
        "Afin de valider votre inscription, veuillez cliquer ce le lien qui suit
        . http://titrepro/views/confirm.php?id=$user->id&token=$user->confirmation_token");
    $_SESSION['flash']['success'] = 'Afin de valider votre compte, un email vous de confirmation vous a été envoyer';
    header('location: views/login.php');
    exit;    
} else {
}