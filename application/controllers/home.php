<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
session_start();
//we need to call PHP's session object to access it through CI
class Home extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('vm_model');
		$this -> load -> model('users_model');
		$this -> load -> model('package_model');
		$this -> load -> model('template_model');
	}

	function index() {

		$this -> load -> helper(array('form'));
		$this -> load -> library('form_validation');

		if($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			//$data['vm'] = $this->news_model->get_vm_by_uid();
			
			$data['users'] = $this -> users_model -> get_all_users();
			$data['package'] = $this -> package_model -> get_all_package();
			$data['template'] = $this -> template_model -> get_all_template();

			$this -> load -> view('home_view', $data);

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
}
?>

