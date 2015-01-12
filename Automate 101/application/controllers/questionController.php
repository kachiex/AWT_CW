<?php
class QuestionController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> model('question');
        $this -> load -> model('report');
        $this -> load -> model('questionVote');
        $this -> load -> model('answer');
        $this -> load -> model('keyword');
        $this -> load -> model('user');

    }

    public function index() {
        $this -> load -> view('post_question_form');
    }

    public function postQuestion() {
        $userID = $this -> input -> post('userIDforQues');
        $txtKeywords = $this -> input -> post('txtKeywords');
        $txtQuesTitle = $this -> input -> post('txtQuesTitle');
        $cmbCatagory = $this -> input -> post('cmbCatagory');
        $txtSum = $this -> input -> post('txtSum');
        if ($txtQuesTitle == '' || $userID == '' || $cmbCatagory == '') {
            return json_encode("missing param");

        } else {
            if ($txtKeywords == '') {
                $txtKeywords = null;
            } else {
                $txtKeyword = $this -> keyword -> addKeyword($txtKeywords);
            }

            $data = $this -> question -> createQuestion($userID, $txtKeyword, $txtQuesTitle, $cmbCatagory, $txtSum);
            $this -> user -> addPoints($userID, 1);
            echo json_encode($data);
        }
    }

    public function like() {
        $userID = $this -> input -> post('userID');
        $questionID = $this -> input -> post('questionID');
        $owner = $this -> questionVote -> like($userID, $questionID);
        $this -> user ->addPoints($owner['userId'],10);
    }

    public function disLike() {
        $userID = $this -> input -> post('userID');
        $questionID = $this -> input -> post('questionID');
        $owner=$this -> questionVote -> dislike($userID, $questionID);
        $this -> user ->addPoints($owner['userId'],-7);
    }

    public function reportQuestion($userID, $questionID, $option, $sum) {
        $userID = $this -> input -> post('userID');
        $questionID = $this -> input -> post('questionID');
        return $this -> report -> createReport($userID, $quectionID, $option, $sum);
    }

    public function shareQuestion($questionID) {

    }

    public function removeQuestion($questionID) {
        return $this -> question -> removeQuestion($questionID);
    }

    public function getQuestion($questionID) {
        return $this -> question -> getQuestion($questionID);

    }

    public function viewQuestion() {

        $questionID = $this -> input -> post('questionID');
        $this -> question -> viewQuestion($questionID);

        $data['question'] = $this -> getQuestion($questionID);
        $data['like'] = $this -> questionVote -> getLikes($questionID);
        $data['dislike'] = $this -> questionVote -> getDislikes($questionID);
        require_once ('answerController.php');
        $answerController = new answerController();
        $data['answres'] = $answerController -> getAnswers($questionID);
        $this -> load -> view('view_question', $data);
    }

}
?>