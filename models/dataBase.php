<?php

/**
 * connexion a la base de données projetpro
 * @author yoan
 */
class dataBase {
    protected $db;
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projetpro;charset=utf8', 'usr_projetpro', 'projetpro');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function __destruct() {
        
    }

}
