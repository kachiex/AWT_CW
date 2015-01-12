<?php

class User extends CI_Model {
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }

    function register($username, $password, $re_password, $user_type, $user_rank, $lname, $fname, $avatar, $email) {
        // is username unique?
        $user_rank = 1;
        $user_type = 1;
        $res = $this -> db -> get_where('user', array('username' => $username));
        if ($res -> num_rows() > 0) {
            return 'Username already exists';
        }
        // username is unique
        $salt = substr(sha1(mt_rand()), 0, 20);
        $hashpwd = sha1($salt . $password);
        $data = array('userName' => $username, 'userTypeID' => $user_type, 'userRankID' => $user_rank, 'password' => $hashpwd, 'fName' => $fname, 'lName' => $lname, 'userRankID' => $user_rank, 'avatar' => $avatar, 'email' => $email, 'salt' => $salt, 'isActive' => 1);
        $this -> db -> insert('user', $data);
        return null;
    }

    function login($username, $pwd) {
        $this -> db -> where(array('userName' => $username));
        $res = $this -> db -> get('user', array('salt'));

        if ($res -> num_rows() != 1) {
            //echo "string one";
            return false;
        }

        $rowData = $res -> row_array();
        $this -> db -> where(array('userName' => $username, 'password' => sha1($rowData['salt'] . $pwd)));
        $res = $this -> db -> get('user', array('userName'));
        if ($res -> num_rows() != 1) {
            //	    echo " two ";
            return false;
        }

        $session_id = $this -> session -> userdata('session_id');
        $row = $res -> row_array();
        $this -> db -> insert('user_ci_session', array('user_id' => $row['userName'], 'ci_session' => $session_id));
        return $res -> row_array();
    }

    function logout() {
        $session_id = $this -> session -> sess_destroy();
    }

    function is_loggedin() {
        $session_id = $this -> session -> userdata('session_id');
        $res = $this -> db -> get_where('user_ci_session', array('ci_session' => $session_id));
        if ($res -> num_rows() == 1) {
            $row = $res -> row_array();
            $username = $row['user_id'];
            return $this -> getData($username);

        } else {
            return false;
        }
    }

    function getData($username) {

        $res = $this -> db -> get_where('user', array('userName' => $username));
        if ($res -> num_rows() == 1) {
            $row = $res -> row_array();

            return $row;
        } else {
            return false;
        }
    }

    function updateData($username, $lname, $fname, $avatar, $email) {
        $data = array();
        if ($lname != '') {
            $data['lName'] = $lname;
        }
        if ($fname != '') {
            $data['fName'] = $fname;
        }
        if ($email != '') {
            $data['email'] = $email;
        }

        if ($avatar != '') {
            $data['avatar'] = $avatar;
        }

        $this -> db -> where('userName', $username);
        return $this -> db -> update('user', $data);

    }

    function changeAvatar($username, $avatar) {

        $data = array('avatar' => $avatar);
        $this -> db -> where('userName', $username);
        $this -> db -> update('user', $data);
    }

    function changePassword($username, $password) {
        $this -> db -> where(array('userName' => $username));
        $res = $this -> db -> get('user', array('salt'));
        $rowData = $res -> row_array();
        $hashpwd = sha1($rowData['salt'] . $password);

        $data = array('password' => $hashpwd);
        $this -> db -> where('userName', $username);
        return $this -> db -> update('user', $data);

    }

    function deactivate($username) {

        $data = array('isActive' => 0);
        $this -> db -> where('userName', $username);
        $this -> db -> update('user', $data);
    }

    function activate($username) {

        $data = array('isActive' => 1);
        $this -> db -> where('userName', $username);
        $this -> db -> update('user', $data);
    }
    
    function addPoints($username,$points) {

        $this -> db -> where('userName', $username);
        $this -> db -> set('points', 'points+'.$points, FALSE);
        $this -> db -> update('user');
    }

    function authenticateUser($username, $pwd) {

        $this -> db -> where(array('userName' => $username));
        $res = $this -> db -> get('user', array('salt'));

        if ($res -> num_rows() != 1) {
            //echo "string one";
            return false;
        }

        $rowData = $res -> row_array();
        $this -> db -> where(array('userName' => $username, 'password' => sha1($rowData['salt'] . $pwd)));
        $res = $this -> db -> get('user', array('userName'));
        if ($res -> num_rows() != 1) {
            //      echo " two ";
            return false;
        }else{
            return true;
        }
    }

}
