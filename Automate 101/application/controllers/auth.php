<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> library('authlib');
        $this -> load -> helper('url');
    }

    public function index() {

        $loggedin = $this -> authlib -> is_loggedin();

        if ($loggedin === false) {
            $data['username'] = $loggedin;

            $data['isLoggedIn'] = 'NO';
            $data['userName'] = "";
            $data['points'] = "";
            $data['points'] = "0";
            $data['rank'] = 'PRIVATE';
            $data['avatar'] = "";
            $data['type'] = "";

        } else {
            $data['isLoggedIn'] = 'YES';
            $data['username'] = $loggedin['userName'];
            $data['userName'] = $loggedin['fName'] . ' ' . $loggedin['lName'];
            $data['points'] = $loggedin['points'];
            $data['rank'] = 'PRIVATE';
            $data['avatar'] = $loggedin['avatar'];
            $data['type'] = $loggedin['userTypeID'];
            //need to fetch name of the user , rank , points and avatar

        }
        $this -> load -> view('basic_template', $data);
    }

    /**
     *
     */
    public function register() {

        $username = $this -> input -> post('txtUserName');
        $email = $this -> input -> post('txtEmail');
        $password = $this -> input -> post('txtPasswordNew');
        $re_password = $this -> input -> post('txtConfPasswordNew');
        $user_type = 1;
        $user_rank = 1;
        $fname = $this -> input -> post('txtFName');
        $lname = $this -> input -> post('txtLName');
        $avatar = $this -> input -> post('txtImage');

        $respond = ($username = $this -> authlib -> register($username, $password, $re_password, $user_type, $user_rank, $lname, $fname, $avatar, $email));
        $this -> load -> view('welcome');
    }

    public function logout() {
        $this -> user -> logout();
        $data['username'] = '';
        
        
    }

    public function authenticate() {
        $username = $this -> input -> post('txtUsrName');
        $password = $this -> input -> post('txtPassword');
        $user = $this -> authlib -> login($username, $password);
        if ($user !== false) {
            $res = $this -> authlib -> getUserData($username);
            $data['username'] = $res['userName'];
            $data['UserName'] = $res['fName'] . $res['lName'];
            $data['Points'] = $res['points'];
            $data['Rank'] = 'Private';
            $data['avatar'] = $res['avatar'];
             $data['type'] = $res['userTypeID'];
            //var_dump($data);
            echo json_encode($data);
        } else {
            $data['username'] = 'Unable to login - please try again';

            return "ERROR";
        }
    }

}
