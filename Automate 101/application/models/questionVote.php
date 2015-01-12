<?php

class QuestionVote extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    public function like($userID, $questionId) {

        $data = array('userID' => $userID, 'questionID' => $questionId, 'isPositive' => 1);
        $this -> db -> insert('questionvote', $data);
        $data = $this -> db -> query("select question.userID from question where question.questionID = " . $questionId . ";");
        return $data -> row_array();
    }

    public function dislike($userID, $questionId) {

        $data = array('userID' => $userID, 'questionID' => $questionId, 'isPositive' => 0);
        $this -> db -> insert('questionvote', $data);
        $data = $this -> db -> query("select question.userID from question where question.questionID = " . $questionId . ";");
        return $data -> row_array();
    }

    public function getLikes($questionId) {
        $res = $this -> db -> query("select count(v.questionVoteID) as likes from questionvote v where v.questionID = '" . $questionId . "' and v.isPositive = 1;");
        return $res -> row_array();
    }

    public function getDislikes($questionId) {
        $res = $this -> db -> query("select count(v.questionVoteID) as dislikes from questionvote v where v.questionID = '" . $questionId . "' and v.isPositive = 0;");
        return $res -> row_array();
    }

}
?>