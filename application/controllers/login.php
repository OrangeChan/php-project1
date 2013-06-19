<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->library('form_validation');
   
   $this->form_validation->set_rules('username', 'username', 'required|valid_email');
	$this->form_validation->set_rules('password', 'password', 'required');
   
   if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('login');
	}
	
   
 }
 public function logout() {

		$this -> session -> unset_userdata('logged_in');
		$this -> session -> sess_destroy();
		redirect('login', 'refresh');
	}

}

?>

