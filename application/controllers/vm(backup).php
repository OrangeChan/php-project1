<?php
class Vm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('vm_model');
	}

	public function create() {

		if ($this -> session -> userdata('logged_in')) {

			$session_data = $this -> session -> userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('vmname', 'VM name', 'required|alpha_dash');
			$this -> form_validation -> set_rules('uid', 'User id', 'required|integer');

			if ($this -> form_validation -> run() === FALSE) {
				$this -> load -> view('home_view', $data);
			} else {
				$this -> vm_model -> set_vm();
				redirect('home', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function viewUserVm() {

		if ($this -> session -> userdata('logged_in')) {
			$session_data = $this -> session -> userdata('logged_in');
			$uid = $session_data['id'];
			$data['user_vm'] = $this -> vm_model -> get_vm_by_uid($uid);
			$this -> load -> view('vm', $data);
		}else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function start($vmname){
		//executing VBscript
			$command = 'wscript.exe D:\startvm.vbs '.$vmname;
			/*
			 * wait for command to return a exit code?
			 *
			 * true = waits for the command to complete, before continuing this script
			 * false = executes command then continues this script without waiting for command to exit
			 *
			 */
			$wait = false;

			// run it
			$obj = new COM('WScript.Shell');

			if (is_object($obj)) {
				$obj -> Run('cmd /C ' . $command, 0, $wait);
			} else {
				echo 'can not create wshell object';
			}

			$obj = null;
		
	}
	
	public function stop($vmname){
		//executing VBscript
			$command = 'wscript.exe D:\stopvm.vbs '.$vmname;
			/*
			 * wait for command to return a exit code?
			 *
			 * true = waits for the command to complete, before continuing this script
			 * false = executes command then continues this script without waiting for command to exit
			 *
			 */
			$wait = false;

			// run it
			$obj = new COM('WScript.Shell');

			if (is_object($obj)) {
				$obj -> Run('cmd /C ' . $command, 0, $wait);
			} else {
				echo 'can not create wshell object';
			}

			$obj = null;
		
	}

}
