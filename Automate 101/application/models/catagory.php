<?php

class Catagory extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
    
    public function getCatalogs() {

        $res = $this -> db -> get("catagory");
        return $res -> result_array();
    }

   
}
?>