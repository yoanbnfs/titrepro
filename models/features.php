<?php
/**
 * database's child
 * @author yoan
 */
class features extends dataBase {

    public function __construct() {
        parent::__construct();
    }
    /**
     * Search bar feature
     * @param type $keyword
     * @return type
     */
    public function getSearchResult($keyword) {        
        $query = 'SELECT `id`, `lastname` FROM `users` WHERE `lastname` LIKE :motclef';
        $searchResult = $this->db->prepare($query);
        $searchResult->bindValue(':motclef', '%' . $keyword . '%', PDO::PARAM_STR);
        $searchResult->execute();
        return $searchResult->fetchAll(PDO::FETCH_OBJ);
    }
    public function getUserById() {
        $query = 'SELECT `lastname`, `firstname`, DATE_FORMAT(`birthdate`, %d-%m-%Y) AS `birthdate`, `mail` FROM `users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);       
    }
}
