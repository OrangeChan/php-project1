<?php
class Package extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> model('package_model');
		$this->load-> helper('form');
	}
	
	public function create() {

		if ($this -> session -> userdata('logged_in')) {

			$session_data = $this -> session -> userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('package_name', 'Package name', 'required|alpha_dash');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('home_view', $data);
			} else {
				$this -> package_model -> set_package();
				redirect('home', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function edit($pid) {

		if ($this -> session -> userdata('logged_in')) {

			$session_data = $this -> session -> userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['package'] = $this -> package_model -> get_package_by_pid($pid);
			$this -> load -> view('package/edit', $data);

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function update() {

		if ($this -> session -> userdata('logged_in')) {

			$session_data = $this -> session -> userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('package_name', 'Package name', 'required|alpha_dash');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('package/edit', $data);
			} else {
				$this -> package_model -> update_package();
				redirect('package/index', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function index() {

		if ($this -> session -> userdata('logged_in')) {
			$data['package'] = $this -> package_model -> get_all_package();
			$this -> load -> view('package/index', $data);
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	
}
	
	
?>