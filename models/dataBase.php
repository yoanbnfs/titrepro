<?php
// Inclusion du fichier contenant les constantes de configuration.
include_once 'configuration.php';

/**
 * Classe de connection à la base de données    
 */
class dataBase {
    // Je définit l'attribut protégé $db qui seras accessible depuis la classe et ses enfants
    protected $db;
    /**
     *  __construct Crée une instance PDO qui représente une connexion à la base 
     */
    public function __construct() {
        // Le try catch récupère l'éxception généré par une errreur de connexion à la base
        try {
            // J'instancie un nouvel objet PDO et le stocke dans l'attribut $db
            // Les informations de connexion à la base de données ont été précedement stockés dans des constantes ( inclues plus haut ).
            $this->db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', DBLOG, 'projetpro');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function __destruct() {
        
    }
}
