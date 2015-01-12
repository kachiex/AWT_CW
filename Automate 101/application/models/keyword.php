<?php

class Keyword extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    function addKeyword($string) {

        $data = array('keyString' => $string);
        $this -> db -> insert('keyword', $data);
        return $this -> db -> insert_id();
    }

}
