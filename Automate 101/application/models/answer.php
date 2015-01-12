<?php

class Answer extends CI_Model {

    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    public function createAnswer($userID, $questionId, $answer) {

        $data = array('userID' => $userID, 'questionId' => $questionId, 'answer' => $answer);
        return $this -> db -> insert('answer', $data);

    }

    public function getAnswers($ID) {

        $res = $this -> db -> query("select user.userRankID,answer.answerId,answer.userId ,answer.questionId , answer.answer ,COUNT(answervote.answerVoteID) as votes, SUM(answervote.isPositive) as likes from answer  left outer join answervote on answer.answerId = answervote.answerID join user on answer.userId = user.userName where answer.questionId = ".$ID." group by answer.answerId order by likes DESC ;");
        return $res -> result_array();
    }

    public function getAnswersByUser($userID) {

        $res = $this -> db -> get_where('answer', array('userID' => $userID));
        return $res -> result_array();

    }

}
?>