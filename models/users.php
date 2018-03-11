<?php
/**
 * class users hérité de dataBase
 * Récupération de l'attibut 'protected' $db
 * @author yoan
 */
class users extends dataBase {
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $password = '';
    public $birthdate = '01/01/1900';
    public $mail = '';
    public $confirmation_token = '';
    
    public function __construct() {
        parent::__construct();
    }
    /**
     * fonction d'inscription d'utilisateurs    
     */
    public function setUser() {
        $query = 'INSERT INTO `users`(`lastname`, `firstname`, `password`, `birthdate`, `mail`, `confirmation_token`) VALUES (:lastname, :firstname, :password, :birthdate, :mail, :confirmation_token)';
        $request = $this->db->prepare($query);
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $request->bindValue(':confirmation_token', $this->confirmation_token, PDO::PARAM_STR);
        if($request->execute()){
            $this->id = $this->db->lastInsertId();
        }
    }
    public function getSearchResult($keyword) {        
        $query = 'SELECT `id`, `lastname` FROM `users` WHERE `lastname` LIKE :motclef';
        $searchResult = $this->db->prepare($query);
        $searchResult->bindValue(':motclef', $keyword, PDO::PARAM_STR);
        $searchResult->execute();
        return $searchResult->fetchAll(PDO::FETCH_OBJ);
    }
    public function getUserById() {
        $query = 'SELECT `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d-%m-%Y\') AS `birthdate`, `mail` FROM `users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();         
        return $request->fetch(PDO::FETCH_OBJ);             
    }
    public function checkUserByMail(){
        $query = 'SELECT COUNT(`mail`) AS `mail` FROM `users` WHERE `mail` = :mail';
        $request = $this->db->prepare($query);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }
    public function getUserByToken(){
        $query = 'SELECT `confirmation_token` FROM `users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($request->execute()){
            $check = $request->fetch(PDO::FETCH_OBJ);   
            $this->confirmation_token = $check->confirmation_token;
            var_dump($check);
        }
    }
    public function setConfirmedUser() {
        $query = 'Update `users` SET `confirmation_token` = NULL, `confirmed_at` = NOW() WHERE `id` = :id';        
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
    }

    public function connectUser(){
        $query = 'SELECT `mail`, `password` FROM `users` WHERE `mail` = :mail AND `password` = :password';
        $request = $this->db->prepare($query);
        $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->execute();
        $userExist = $request->rowCount();
        if($userExist == 1){
            return $request->fetchAll(PDO::FETCH_OBJ);            
        } else {
            
        }
        
    }

        
        public function __destruct(){
        
    }
}
