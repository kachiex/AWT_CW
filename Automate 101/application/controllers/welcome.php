<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 class Welcome extends CI_Controller {

 /**
 * Index Page for this controller.
 *
 * Maps to the following URL
 * 		http://example.com/index.php/welcome
 *	- or -
 * 		http://example.com/index.php/welcome/index
 *	- or -
 * Since this controller is set as the default controller in
 * config/routes.php, it's displayed at http://example.com/
 *
 * So any other public methods not prefixed with an underscore will
 * map to /index.php/welcome/<method_name>
 * @see http://codeigniter.com/user_guide/general/urls.html
 */
/*
 public function index()
 {
 $this->load->view('myview');
 }
 }
 * */

class Welcome extends CI_Controller {
    public function index() {
        $this -> load -> library('authlib');
        $loggedin = $this -> authlib -> is_loggedin();

        if ($loggedin === false) {
            $data['username'] = $loggedin;

            $data['isLoggedIn'] = 'NO';
            $data['userName'] = "";
            $data['points'] = "";
            $data['points'] = "0";
            $data['rank'] = 'PRIVATE';
            $data['avatar'] = "";

        } else {
            $data['isLoggedIn'] = 'YES';
            $data['username'] = $loggedin['userName'];
            $data['userName'] = $loggedin['fName'] . ' ' . $loggedin['lName'];
            $data['points'] = "308";
            $data['rank'] = 'PRIVATE';
            $data['avatar'] = $loggedin['avatar'];
            //need to fetch name of the user , rank , points and avatar

        }

        $this -> load -> view('basic_template', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
