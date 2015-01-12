<?php

class Authlib {
 
    function __construct()
    {
        // get a reference to the CI super-object, so we can
        // access models etc. (because we don't extend a core
        // CI class)
        $this->ci = &get_instance();
 
        $this->ci->load->model('user');
 
    }
 
    public function register($username,$password,$re_password,$user_type,$user_rank,$lname,$fname,$avatar,$email)
    {
        if ($username == '' || $email == ''|| $password == '' || $re_password == '' || $user_type == '' || $user_rank == '' || $lname == ''|| $fname == '') {
            return 'Missing field';
        }
        if ($password != $re_password) {
            return "Passwords do not match";
        }
        return $this->ci->user->register($username,$password,$re_password,$user_type,$user_rank,$lname,$fname,$avatar,$email);
    }
    
    public function login($username,$password)
    {
        if ($username == '' || $password == '') {
            return false;
        }
        return $this->ci->user->login($username,$password);
    }
    
    public function is_loggedin()
    {
        return $this->ci->user->is_loggedin();
    }
    
    public function getUserData($username)
    {
        return $this->ci->user->getData($username);
    }
}