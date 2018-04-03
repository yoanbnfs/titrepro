<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of workon
 *
 * @author yoan
 */
class workOn {
     public function __construct() {
        parent::__construct();
    }
    public function getProjectByUser() {
        $query = 'SELECT * FROM qmsld_workOn '
                . 'INNER JOIN qmsld_users ON qmsld_workOn.id_qmsld_users = qmsld_users.id '
                . 'INNER JOIN qmsld_projects ON qmsld_workOn.id_qmsld_projects = qmsld_projects.id ';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);             
    }
}
