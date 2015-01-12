<?php
class userController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this -> load -> model('user');

    }

    public function index() {
        $userID = $this -> input -> post('userID');
        $data = $this -> user -> getData($userID);
        $this -> load -> view('user_Profile', $data);
    }

    public function updateUser() {
        $userID = $this -> input -> post('userID');
        $fName = $this -> input -> post('txtFnameEdit');
        $lName = $this -> input -> post('txtLnameEdit');
        $email = $this -> input -> post('txtEmailEdit');
        $res = $this -> user -> updateData($userID, $lName, $fName,"", $email);
       
        $data = $this -> user -> getData($userID);
        $this -> load -> view('user_Profile', $data);

    }

    public function changePassword() {
        $userID = $this -> input -> post('userID');
        $currentPasssWord = $this -> input -> post('txtCurrentPasswordEdit');
        $newPassWord = $this -> input -> post('txtNewPasswordEdit');
        $newPassWordConf = $this -> input -> post('txtConfirmNewPasswordEdit');
        if ($newPassWord == '' || $newPassWordConf == '' || $currentPasssWord == '' || $userID == '') {
            return "Missing Param";
        } else {
            if ($newPassWord == $newPassWordConf) {
                $valid = $this -> user -> authenticateUser($userID, $currentPasssWord);
                if ($valid == true) {
                    return $this -> user -> changePassword($userID, $newPassWord);
                } else {
                    return "Invalid Password";
                }
            } else {
                return "Password Missmatched";
            }

        }
        return $this -> user -> like($userID, $answerID);
    }

    public function changeAvatar() {
        $userID = $this -> input -> post('userID');
        $avatar = $this -> input -> post('avatar');

        return $this -> user -> changeAvatar($userID, $avatar);
        
        $data = $this -> user -> getData($userID);
        $this -> load -> view('user_Profile', $data);
    }

}
?>