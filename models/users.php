<?php
/* class users hérité de dataBase
 * Récupération de l'attibut protegé $db 
 */
class users extends dataBase {
    /* Je déclare mes attributs de classe
     */
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $name ='';
    public $password = '';
    public $birthdate = '1900-01-01';
    public $mail = '';
    public $confirmation_token = '';
    public $confirmed_at = '1900-01-01';
    public $userTypes = 0;
    public $subTypes = NULL;
    //J'ajoute des attribut privés afin de gérer plus facilement mon prefixe de tables (stocké dans des constantes).
    private $tableName = TABLEPREFIX . 'users';



    public function __construct() {
        parent::__construct();
    }
    /*
     * Grâce a la méthode getSearchResult je selectionne les champs qui m'interesse afin d'afficher le résultat de la demande entrée dans la barre de recheche
     * Cette méthode prends en paramètre le mot clef.
     */
    public function getSearchResult($keyword) {        
        $query = 'SELECT `id`, `lastname` FROM `' . $this->tableName . '` WHERE `lastname` LIKE :motclef';
        $searchResult = $this->db->prepare($query);
        $searchResult->bindValue(':motclef', '%' . $keyword . '%', PDO::PARAM_STR);
        $searchResult->execute();
        return $searchResult->fetchAll(PDO::FETCH_OBJ);
    }
    /*
     * Grace à la méthode setUser, j'insert dans la table 'users' chaque champs renseignés dans le formulaire d'inscription d'utilisateurs
     * ainsi que le token de confirmation, générer dans le controller afin de valider l'inscription par e-mail.
     */
    public function setUser() {
        $correct = FALSE;
        $query = 'INSERT INTO `' . $this->tableName . '` '
                    . '(`lastname`, `firstname`, `name`, `password`, `birthdate`, `mail`, `confirmation_token`, `id_qmsld_userTypes`, `id_qmsld_subTypes`) '
                . 'VALUES '
                    . '(:lastname, :firstname, :name, :password, :birthdate, :mail, :confirmation_token, :userTypes, :subTypes)';
        $request = $this->db->prepare($query);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $request->bindValue(':confirmation_token', $this->confirmation_token, PDO::PARAM_STR);
        $request->bindValue(':userTypes', $this->userTypes, PDO::PARAM_INT);
        $request->bindValue(':subTypes', $this->subTypes, PDO::PARAM_INT);
        if($request->execute()){
            $this->id = $this->db->lastInsertId();
            $correct = TRUE;
        }
        return $correct;
    }
    
    public function getUserById() {
        $correct = FALSE;
        $query = 'SELECT `lastname`, `firstname`, `name`, `password`, `birthdate`, `mail`, `confirmed_at`, `id_qmsld_subTypes`, `id_qmsld_userTypes` '
                    . 'FROM `' . $this->tableName . '` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($request->execute()){
            $result = $request->fetch(PDO::FETCH_OBJ);  
            $this->lastname = $result->lastname;
            $this->firstname = $result->firstname;
            $this->name = $result->name;
            $this->mail = $result->mail;
            $this->password = $result->password;
            $this->birthdate = $result->birthdate;
            $this->confirmed_at = $result->confirmed_at;
            $this->subTypes = $result->id_qmsld_subTypes;
            $this->userTypes = $result->id_qmsld_userTypes;
            $correct = TRUE;
         }               
         return $correct;
    }
    
    public function getUserByMail(){
        $correct = FALSE;
        $query = 'SELECT `id`, `lastname`, `firstname`, `name`, `password`, DATE_FORMAT(`birthdate`, \'%d-%m-%Y\') AS `birthdate`, `confirmed_at`, `id_qmsld_subTypes`, `id_qmsld_userTypes` '
                . 'FROM `' . $this->tableName . '` WHERE `mail` = :mail';
        $request = $this->db->prepare($query);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
         if ($request->execute()){
            $result = $request->fetch(PDO::FETCH_OBJ);  
            $this->id = $result->id;
            $this->lastname = $result->lastname;
            $this->firstname = $result->firstname;
            $this->name = $result->name;
            $this->password = $result->password;
            $this->birthdate = $result->birthdate;
            $this->confirmed_at = $result->confirmed_at;
            $this->subTypes = $result->id_qmsld_subTypes;
            $this->userTypes = $result->id_qmsld_userTypes;
            $correct = TRUE;
         }  
         return $correct;
    }
    public function checkUserByMail(){
        $query = 'SELECT COUNT(`mail`) AS `mail` FROM `' . $this->tableName . '` WHERE `mail` = :mail';
        $request = $this->db->prepare($query);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }
    public function getTokenById(){
        $correct = FALSE;
        $query = 'SELECT `confirmation_token` FROM `' . $this->tableName . '` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($request->execute()){
            $check = $request->fetch(PDO::FETCH_OBJ);   
            $this->confirmation_token = $check->confirmation_token;
            $correct = TRUE;
        }
        return $correct;
    }
    public function setConfirmedUser() {
        $query = 'Update `' . $this->tableName . '` SET `confirmation_token` = NULL, `confirmed_at` = NOW() WHERE `id` = :id';        
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
    public function connectUser(){
        $correct = FALSE;
        $query = 'SELECT `password` FROM `' . $this->tableName . '` WHERE `mail` = :mail AND `confirmed_at` IS NOT NULL';
        $request = $this->db->prepare($query);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $request->execute();
        $userExist = $request->rowCount();
        if($userExist == 1){
            $result = $request->fetch(PDO::FETCH_OBJ);    
            $this->password = $result->password;
            $correct = TRUE;
        }
        return $correct;
    }    
    public function getTypesById() {
        $query = 'SELECT `type`, `subTypesName` '
                    . 'FROM `qmsld_users` '
                . 'INNER JOIN `qmsld_userTypes` '
                    . 'ON `qmsld_users`.`id_qmsld_userTypes` = `qmsld_userTypes`.`id` '
                . 'INNER JOIN `qmsld_subTypes` '
                    . 'ON `qmsld_userTypes`.`id` = `qmsld_subTypes`.`id_qmsld_userTypes` '
                . 'WHERE `qmsld_users`.`id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);             
    }
    public function updateUser() {
        $query = 'UPDATE `' . $this->tableName . '` '
                    . 'SET `lastname` = :lastname, `firstname` = :firstname, `name` = :name, `birthdate` = :birthdate, `password` = :password '
                . 'WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $request->execute();
    }
    public function eraseUser() {
        $query = 'DELETE FROM `' . $this->tableName . '` WHERE `qmsld_users`.`id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }    
        public function __destruct(){
         parent::__destruct();
        }
}
