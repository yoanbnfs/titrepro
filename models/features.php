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
        $query = 'SELECT `id`, `lastname` FROM `oikjhnb_users` WHERE `lastname` LIKE :motclef';
        $searchResult = $this->db->prepare($query);
        $searchResult->bindValue(':motclef', '%' . $keyword . '%', PDO::PARAM_STR);
        $searchResult->execute();
        return $searchResult->fetchAll(PDO::FETCH_OBJ);
    }
}
