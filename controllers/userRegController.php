<?php
/*Grâce a PHP_SELF je change les chemins des includes par rapport aux pages sur laquelle je me situe
 * si elles se situes dans dans dossiers differents 
 * ICI 'index.php' se situe a la racine do mon dossier
 * les autres pages se situant dans le dossier views
 */
if ($_SERVER['PHP_SELF'] == '/index.php') {
    include_once 'models/dataBase.php';
    include_once 'models/users.php';
    include_once 'models/configuration.php';
} else {
    include_once '../models/dataBase.php';
    include_once '../models/users.php';
    include_once '../models/configuration.php';
}
/**
 * Instanciation d'un nouvel utilisateur dans la class publique 'users'
 */
$user = new users();
/**
 * Création du tableau d'erreur du formulaire d'inscription
 * ce tableau récuperaras champ par champ les erreur définis, si elles sont générées 
 */
$errors = array();
    /**
     * Vérification champ par champ du formulaire d'inscription
     * Les vérification se font en Ajax avex $.post 
     */

    //si l'input sélectionné $(this) éxiste ...
    if (isset($_POST['checkInput'])) {       
        //et si la correspondance entre la data d'ajax et l'attribut 'name' de l'input ce fait 
            if ($_POST['check'] == 'ajaxlastname') {            
                if (empty($_POST['checkInput'])) {                    
                    $errors['lastname'] = 'Veuillez renseigner votre nom de famille';                
                } elseif (!preg_match(REGTEXT, $_POST['checkInput'])) {                    
                        $errors['lastname'] = 'Votre nom ne doit comporter que des lettres';
                } 
                if (!empty($errors['lastname'])) {
                    echo json_encode($errors);
                } 
            }
            if ($_POST['check'] == 'ajaxfirstname') {            
                if (empty($_POST['checkInput'])) {                
                    $errors['firstname'] = 'Veuillez renseigner votre prénom';                
                } elseif (!preg_match(REGTEXT, $_POST['checkInput'])) {                    
                    $errors['firstname'] = 'Votre prénom ne doit comporter que des lettres';
                }           
                if (!empty($errors['firstname'])) {
                    echo json_encode($errors);
                }
            }
        if ($_POST['check'] == 'ajaxpassword') {
            $user->password = $_POST['checkInput'];
            if (strlen($_POST['checkInput']) < 8) {                
                $errors['password'] = 'Votre mot de passe doit comporter 8 caractères minimum';                
            } 
            if (!empty($errors['password'])) {
                echo json_encode($errors);
            } 
        }
        if ($_POST['check'] == 'ajaxconfirm-password') {
            if (empty($_POST['checkInput'])){
                $errors['confirm-password'] = 'Veuillez confirmer votre mot de passe';                
            } elseif ($_POST['checkInput'] != $user->password){
                $errors['confirm-password'] = 'La confirmation de mot de passe à echouée';
            }        
            if (!empty($errors['confirm-password'])){
                echo json_encode($errors);
            }
        }
        if ($_POST['check'] == 'ajaxbirthdate') {
            if(empty($_POST['checkInput'])) {                
                $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';                
            } elseif (!preg_match(REGDATE, $_POST['checkInput'])) {                    
                $errors['birthdate'] = 'La date doit être au format : jj/mm/aaaa';                
            } 
            if (!empty($errors['birthdate'])) {
                echo json_encode($errors);            
            }
        }
        if ($_POST['check'] == 'ajaxmail') {
            $user->mail = $_POST['checkInput'];
            $existingMail = $user->checkUserByMail();
            $checkMail = intval($existingMail->mail);
            if (empty($_POST['checkInput'])){                
                $errors['mail'] = 'Veuillez renseigner votre adresse email';                
            } elseif (!preg_match(REGMAIL, $_POST['checkInput'])) {                    
                    $errors['mail'] = 'E-mail non valide. Exemple : contact@domaine.fr';                    
            } elseif ($checkMail == 1) {                
                $errors['mail'] = 'Cette adresse mail est déjà enregistrée';                  
            }
            if(!empty($errors['mail'])){
                echo json_encode($errors);            
            }
        }   
    }
if (!empty($_POST['password']) && !empty($_POST['mail'])) {    
    $user->mail = strip_tags($_POST['mail']);
    $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $setToken = password_hash('connection', PASSWORD_BCRYPT);
    $user->confirmation_token = $setToken;
    $userTypes = $_POST['registerType'];
    $user->userTypes = intval($userTypes);   
    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['birthdate']) && count($errors) == 0) {
        $user->lastname = strip_tags($_POST['lastname']);                    
        $user->firstname = strip_tags($_POST['firstname']);
        $user->birthdate = strip_tags($_POST['birthdate']);      
    } elseif (!empty($_POST['name']) && count($errors) == 0){
        $user->name = strip_tags($_POST['name']);
    }    
    if($user->setUser()){
        $object = 'Confirmation de votre compte';
        $content = 'Afin de valider votre inscription, veuillez cliquer ce le lien qui suit';
        $tokenLink = 'http://titrepro/views/confirm.php?id=' . $user->id . '&token=' . $user->confirmation_token;
        mail($user->mail, $object, $content . ' ' .  $tokenLink);
        $_SESSION['flash']['success'] = 'Afin de valider votre compte, un email vous de confirmation vous a été envoyer';
        header('location: views/login.php');
        exit;    
    } else {
        $_SESSION['flash']['danger'] = 'Un problème est survenu, veuillez contacter un administrateur';
    }
}
