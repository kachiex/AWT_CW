<?php

class AnswerVote extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    public function like($userID, $AnswerId) {

        $data = array('userID' => $userID, 'answerID' => $AnswerId, 'isPositive' => 1);
        $this -> db -> insert('answervote', $data);
        $data = $this -> db -> query("select answer.userId from answer where answer.answerId = " . $AnswerId . ";");
        return $data -> row_array();
    }

    public function dislike($userID, $AnswerId) {

        $data = array('userID' => $userID, 'answerID' => $AnswerId, 'isPositive' => 0);
        $this -> db -> insert('answervote', $data);
        $data = $this -> db -> query("select answer.userId from answer where answer.answerId = " . $AnswerId . ";");
        return $data -> row_array();
    }

    public function getLikes($answerId) {
        $res = $this -> db -> query("select count(v.answerVoteID) as likes from answervote v where v.answerID = '" . $answerId . "' and v.isPositive = 1;");
        return $res -> row_array();
    }

    public function getDislikes($answerId) {
        $res = $this -> db -> query("select count(v.answerVoteID) as dislikes from answervote v where v.answerID = '" . $answerId . "' and v.isPositive = 0;");
        return $res -> row_array();
    }

}
?>