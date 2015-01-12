<?php
class MainController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> model('question');
        $this -> load -> model('catagory');
        $this -> load -> model('questionVote');
        $this -> load -> model('answer');

    }

    public function index() {
        $data['list'] = $this -> input -> post('data');
        $this -> load -> view('questionList', $data);

    }

    public function loadCatagory() {
        $data = $this -> catagory -> getCatalogs();
        echo json_encode($data);
    }

   

}
?>