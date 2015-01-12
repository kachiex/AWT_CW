<?php

class Report extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    public function createReport($userID, $quectionId, $option, $sum) {

        $data = array('userID' => $userID, 'quectionID' => $quectionId, 'option' => $option, 'sum' => $sum);
        return $this -> db -> insert('report', $data);
    }

    function getReports() {

        $res = $this -> db -> get_where('report', array('isreview' => 0));
        return $res -> result_array();
    }

    function markRevied($reportID) {

        $data = array('isreview' => 1);
        $this -> db -> where('reportID', $reportID);
        $this -> db -> update('report', $data);
    }

}
?>