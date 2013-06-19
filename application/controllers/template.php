<?php
class Template extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> model('template_model');
		$this->load-> helper('form');
	}
	
	public function create() {

		if ($this -> session -> userdata('logged_in')) {

			$session_data = $this -> session -> userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('template_name', 'template name', 'required|alpha_dash');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('home_view', $data);
			} else {
				$this -> template_model -> set_template();
				redirect('home', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function edit($tid) {

		if ($this -> session -> userdata('logged_in')) {

			$session_data = $this -> session -> userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['template'] = $this -> template_model -> get_template_by_tid($tid);
			$this -> load -> view('template/edit', $data);

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

			$this -> form_validation -> set_rules('template_name', 'template name', 'required|alpha_dash');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('template/edit', $data);
			} else {
				$this -> template_model -> update_template();
				redirect('template/index', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function index() {

		if ($this -> session -> userdata('logged_in')) {
			$data['template'] = $this -> template_model -> get_all_template();
			$this -> load -> view('template/index', $data);
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	
}
	
	
?>