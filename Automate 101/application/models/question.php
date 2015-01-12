<?php

class Question extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    public function createQuestion($userID, $keywordId, $title, $catagoryId, $sum) {

        $data = array('userID' => $userID, 'keywordId' => $keywordId, 'catagoryId' => $catagoryId, 'title' => $title, 'sum' => $sum);
        $this -> db -> insert('question', $data);
        return $this -> db -> insert_id();

    }

    public function getQuestion($ID) {

        $res = $this -> db -> get_where('question', array('questionID' => $ID));
        if ($res -> num_rows() == 1) {
            return $res -> row_array();
        } else {
            return 'ERROR';
        }

    }

    public function searchQuestion($keys) {
        $query = "select question.questionID,question.userID,question.catagoryId,question.title,question.sum,views,count(questionvote.questionVoteID) as votes , SUM(questionvote.isPositive) as likes from question left outer join keyword on keyword.keywordId = question.keywordId  left outer join questionvote on question.questionID = questionvote.questionID where question.userID like ' '";
        foreach ($keys as $value) {
            $key = strtolower($value);
            $query = $query . " or lower(question.sum) like '%" . $key . "%' or lower(question.title) like '%" . $key . "%' or lower(keyword.keyString) like '%" . $key . "%' ";
        }
        $query = $query . " group by question.questionID order by likes DESC ; ";
        $res = $this -> db -> query($query);
        return ($res -> result_array());

    }

    public function getQuestionByUser($userID) {

        $res = $this -> db -> query("select question.questionID,question.userID,question.catagoryId,question.title,question.sum,views,count(questionvote.questionVoteID) as votes , SUM(questionvote.isPositive) as likes from question left outer join keyword on keyword.keywordId = question.keywordId left outer join questionvote on question.questionID = questionvote.questionID where question.userID like '" . $userID . "' group by question.questionID order by likes DESC; ");
        return ($res -> result_array());

    }

    public function getInitQuestion($sort) {

        $orderby = 'question.questionID';
        if ($sort == 'pop') {
            $orderby = 'views';
        } else if ($sort == 'rep') {
            $orderby = 'likes';
        }
        $res = $this -> db -> query("select question.questionID,question.userID,question.catagoryId,question.title,question.sum,views,count(questionvote.questionVoteID) as votes , SUM(questionvote.isPositive) as likes from question left outer join keyword on keyword.keywordId = question.keywordId left outer join questionvote on question.questionID = questionvote.questionID group by question.questionID order by " . $orderby . " DESC limit 20; ");
        return ($res -> result_array());

    }

    public function removeQuestion($questionID) {

        $this -> db -> where('questionID', $questionID);
        $this -> db -> delete('question');

    }
    
     public function viewQuestion($questionID) {

        $this -> db -> query("UPDATE question SET views = views + 1 WHERE question.questionID = '".$questionID."'");
        

    }

    public function markViewToQuestion($questionID) {

        $this -> db -> where('questionID', $questionID);
        $this -> db -> set('views', 'views+1', FALSE);
        $this -> db -> update('question');

    }

}
?>