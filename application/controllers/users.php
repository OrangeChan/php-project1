<?php
class Users extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
	}
	
	public function index() {

		if ($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			$data['title'] = "账号列表";
			$data['users'] = $this -> users_model -> get_all_users();
			$this -> load -> view('header', $data);
			$this -> load -> view('users/index', $data);
			$this -> load -> view('footer');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function create(){
		if ($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			$data['title'] = "建立账号";
			$this -> load -> view('header', $data);
			$this -> load -> view('users/create', $data);
			$this -> load -> view('footer');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function insert() {

		if($session_data = $this -> authAdmin()) {

			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('username', 'username', 'required|valid_email|is_unique[pj1_users.email]|xss_clean');
			$this -> form_validation -> set_rules('password', 'password', 'required|xss_clean');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('header', $data);
				$this -> load -> view('users/create', $data);
				$this -> load -> view('footer');
			} else {
				$this -> users_model -> set_users();
				redirect('users/index', 'refresh');
			}
		
		
		}else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function edit($uid){
		if ($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			
			$data['users'] = $this -> users_model -> get_users_by_uid($uid);
			$this -> load -> view('header', $data);
			$this -> load -> view('users/edit', $data);
			$this -> load -> view('footer');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function update() {

		if($session_data = $this -> authAdmin()) {

			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('username', 'username', 'required|valid_email|xss_clean');
			$this -> form_validation -> set_rules('password', 'password', 'xss_clean');
			$this -> form_validation -> set_rules('status', 'status', 'required|integer|xss_clean');

			if ($this -> form_validation -> run() === FALSE) {
				$uid = $this -> input -> post('uid');
				$data['users'] = $this -> users_model -> get_users_by_uid($uid);
				$this -> load -> view('header', $data);
				$this -> load -> view('users/edit', $data);
				$this -> load -> view('footer');
			} else {
				$this -> users_model -> update_users();
				redirect('users/index', 'refresh');
			}
		
		
		}else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function delete($uid) {
		if ($session_data = $this -> authAdmin()) {
			//$this -> input -> post('vmid') = (int)$this -> input -> post('vmid');
			$this -> users_model -> delete_users($uid);
			redirect('users/index', 'refresh');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}
	
}
