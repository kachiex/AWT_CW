<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rest extends CI_Controller {

    function __construct() {
        parent::__construct();
        // needed model classes
        $this -> load -> model('question');
        $this -> load -> model('answer');

    }

    public function _remap() {
        $request_method = $this -> input -> server("REQUEST_METHOD");
        switch (strtolower($request_method)) {
            case 'get' :
                $this -> fetchQuestion();
                break;
            case 'post' :
                $this -> searchQuestion();
                break;
            default :
                show_error("Unsupported method", 404);
                break;
        }
    }

    public function searchQuestion() {

        $args = $this -> uri -> uri_to_assoc(2);
        if (isset($args['key'])) {
            $data = explode('%20', $args['key']);
            $temp = $this -> question -> searchQuestion($data);
        } else if (isset($args['user'])) {
            $data = $args['user'];
            $temp = $this -> question -> getQuestionByUser($data);
        } else if (isset($args['init'])) {
            $catalog = '';
            if (isset($args['catalog'])) {
                $catalog = $args['catalog'];
            }
            $data = $args['init'];
            $temp = $this -> question -> getInitQuestion($data, $catalog);
        } else {
            $temp = array();
        }
        $count = 0;
        foreach ($temp as $value) {
            $quectionID = $value['questionID'];
            $answerList = $this -> answer -> getAnswers($quectionID);
            if (!(empty($answerList))) {
                $temp[$count]['Answer'] = $answerList[0];
            }

        }

        echo json_encode($temp);
    }

    public function fetchQuestion() {
        $this -> searchQuestion();

    }

}
