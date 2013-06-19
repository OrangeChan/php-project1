<?php
class Changepassword extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
	}

	public function index() {
		if ($session_data = $this -> auth()) {
			$data['username'] = $session_data['username'];
			$data['warning'] = "";
			$this -> load -> view('header', $data);
			$this -> load -> view('changepw', $data);
			$this -> load -> view('footer');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

	public function change() {

		if ($session_data = $this -> auth()) {
			$data['username'] = $session_data['username'];
			$uid = $session_data['id'];
			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('old_password', 'Old password', 'required|xss_clean');
			$this -> form_validation -> set_rules('new_password', 'New password', 'required|xss_clean');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('header', $data);
				$this -> load -> view('changepw', $data);
				$this -> load -> view('footer');
			} else {

				$user_item = $this -> users_model -> get_users_by_uid($uid);
				$old_password = hash_hmac('sha1', $this -> input -> post('old_password'), $user_item['salt']);
				if ($old_password == $user_item['pass']) {
					$this -> users_model -> change_pw($uid);
					redirect('vm/index', 'refresh');
				} else {
					$data['warning'] = "Wrong current password!";
					$this -> load -> view('header', $data);
					$this -> load -> view('changepw', $data);
					$this -> load -> view('footer');
				}

			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

}
?>