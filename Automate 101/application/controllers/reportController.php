<?php
class ReportController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> model('report');

    }

    public function index() {

    }

    public function reportQuestion() {
        $userID = $this -> input -> post('reportingUser');
        $questionID = $this -> input -> post('reportQues');
        $option = $this -> input -> post('reportoption');
        $sum = $this -> input -> post('reportsum');
        
       // var_dump($this -> input -> post);
        $data = $this -> report -> createReport($userID, $questionID, $option, $sum);
        return $data;
    }
    
    public function listReports() {
      
       // var_dump($this -> input -> post);
        $data['list'] = $this -> report -> getReports();
         $this -> load -> view('reports', $data);
    }

}
?>