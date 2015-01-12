<?php
class answerController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> model('answerVote');
        $this -> load -> model('answer');
        $this -> load -> model('user');

    }

    public function index() {
        $data['questionID'] = $this -> input -> post('questionID');
        $this -> load -> view('post_answer_form', $data);
    }

    public function postAnswer() {
        $questionID = $this -> input -> post('idforQues');
        $txtanswer = $this -> input -> post('txtAns');
        $userID = $this -> input -> post('idforUser');

        if ($txtanswer == '' || $userID == '' || $questionID == '') {
            return json_encode("missing param");

        } else {

            $data = $this -> answer -> createAnswer($userID, $questionID, $txtanswer);
            $this -> user -> addPoints($userID, 2);
            echo json_encode($data);
        }
    }

    public function like() {
        $userID = $this -> input -> post('userID');
        $answerID = $this -> input -> post('answerID');
        $owner = $this -> answerVote -> like($userID, $answerID);
        var_dump($owner);
        $this -> user -> addPoints($owner['userId'], 5);

    }

    public function disLike() {
        $userID = $this -> input -> post('userID');
        $answerID = $this -> input -> post('answerID');
        $owner = $this -> answerVote -> dislike($userID, $answerID);
        $this -> user -> addPoints($owner['userId'], -3);
    }

    public function removeAnswer($ID) {
        return $this -> answer -> removeAnswer($answerID);
    }

    public function getAnswers($questionID) {
        $res = $this -> answer -> getAnswers($questionID);
        return $res;
    }

    public function viewAnswer($questionID) {

        $data['answers'] = $this -> getAnswers($questionID);

        // $this -> load -> view('view_answer', $data);
        return $data;
    }

}
?>