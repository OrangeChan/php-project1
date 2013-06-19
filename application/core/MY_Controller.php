<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function auth()
    {
    	$session_data = $this -> session -> userdata('logged_in');
        if ($session_data){
			return $session_data;
		}
		else {
			return FALSE;
		}

    }
	
	public function authAdmin(){
		$session_data = $this -> session -> userdata('logged_in');
		if($session_data['level'] == 3) {
			return $session_data;
		}
		else{
			return FALSE;
		}
	}
	
	public function logout() {
		$this -> session -> unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}
}