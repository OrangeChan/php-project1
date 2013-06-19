<?php
class Vm extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('vm_model');
		$this -> load -> model('users_model');
		$this -> load -> model('package_model');
		$this -> load -> model('template_model');
		$this -> load -> model('ip_model');
	}

	public function index() {

		if ($session_data = $this -> auth()) {
			$data['username'] = $session_data['username'];
			$data['title'] = "虚拟机列表";
			if($this -> authAdmin()){
				$data['vm'] = $this -> vm_model -> get_all_vm();
			} else {
				$data['vm'] = $this -> getUserVM();
			}
			$data['vm'] = $this -> vm_model -> get_all_vm();
			for($i=0; $i<sizeof($data['vm']); $i++){
				$data['vm'][$i]['ip'] = array();
				$package_record = $this -> package_model -> get_package_by_pid($data['vm'][$i]['package']);
				$template_record = $this -> template_model -> get_template_by_tid($data['vm'][$i]['template']);
				$data['vm'][$i]['package'] =  $package_record['package_name'];
				$data['vm'][$i]['template'] = $template_record['template_name'];
				$ip_record = $this -> ip_model -> get_ip_by_vmid($data['vm'][$i]['vmid']);
				$j = 0;
				foreach($ip_record as $ip_item){
					
					$data['vm'][$i]['ip'][$j] = $ip_item['ip'];
					$j++;
				}
			}
			$this -> load -> view('header', $data);
			$this -> load -> view('vm/index', $data);
			$this -> load -> view('footer');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
/*
	public function viewUserVm() {

		if ($session_data = $this -> auth()) {
			$data['username'] = $session_data['username'];
			$data['user_vm'] = $this -> getUserVM();
			for($i=0; $i<sizeof($data['user_vm']); $i++){
				$data['user_vm'][$i]['ip'] = array();
				$package_record = $this -> package_model -> get_package_by_pid($data['user_vm'][$i]['package']);
				$template_record = $this -> template_model -> get_template_by_tid($data['user_vm'][$i]['template']);
				$data['user_vm'][$i]['package'] =  $package_record['package_name'];
				$data['user_vm'][$i]['template'] = $template_record['template_name'];
				$ip_record = $this -> ip_model -> get_ip_by_vmid($data['user_vm'][$i]['vmid']);
				$j = 0;
				foreach($ip_record as $ip_item){
					
					$data['user_vm'][$i]['ip'][$j] = $ip_item['ip'];
					$j++;
				}
			}
			$this -> load -> view('vm/user_vm', $data);
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
*/
	public function insert() {

		if ($session_data = $this -> authAdmin()) {

			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('vmname', 'VM name', 'required|alpha_dash|xss_clean');
			$this -> form_validation -> set_rules('package', 'Package', 'required|alpha_dash|xss_clean');
			$this -> form_validation -> set_rules('template', 'Template', 'required|alpha_dash|xss_clean');

			if ($this -> form_validation -> run() === FALSE) {
				$data['users'] = $this -> users_model -> get_all_users();
			$data['package'] = $this -> package_model -> get_all_package();
			$data['template'] = $this -> template_model -> get_all_template();
			$data['ip'] = $this -> ip_model -> get_free_ip();	
			$this -> load -> view('header', $data);
				$this -> load -> view('vm/create', $data);
				$this -> load -> view('footer');
			} else {
				$this -> vm_model -> set_vm();
				$vmid = $this -> db -> insert_id();
				$this -> ip_model -> assign_ip($vmid);
				redirect('vm/index', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function create() {

		if ($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			$data['title'] = "建立虚拟机";
			$data['users'] = $this -> users_model -> get_all_users();
			$data['package'] = $this -> package_model -> get_all_package();
			$data['template'] = $this -> template_model -> get_all_template();
			$data['ip'] = $this -> ip_model -> get_free_ip();			
			$this -> load -> view('header', $data);
			$this -> load -> view('vm/create', $data);
			$this -> load -> view('footer');

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

	public function edit($vmid) {

		if ($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			$data['title'] = "修改虚拟机";
			$data['vm'] = $this -> vm_model -> get_vm_by_vmid($vmid);
			$data['users'] = $this -> users_model -> get_all_users();
			$data['package'] = $this -> package_model -> get_all_package();
			$data['template'] = $this -> template_model -> get_all_template();
			$data['ip'] = $this -> ip_model -> get_ip_by_vmid($vmid);
			$this -> load -> view('header', $data);
			$this -> load -> view('vm/edit', $data);
			$this -> load -> view('footer');

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

	public function update() {

		if ($session_data = $this -> authAdmin()) {

			$data['username'] = $session_data['username'];

			$this -> load -> helper('form');
			$this -> load -> library('form_validation');

			$data['title'] = 'Create a news item';

			$this -> form_validation -> set_rules('vmname', 'VM name', 'required|alpha_dash|xss_clean');
			$this -> form_validation -> set_rules('uid', 'User id', 'required|integer|xss_clean');
			$this -> form_validation -> set_rules('package', 'Package', 'required|alpha_dash|xss_clean');
			$this -> form_validation -> set_rules('template', 'Template', 'required|alpha_dash|xss_clean');

			if ($this -> form_validation -> run() === FALSE) {
				$vmid = $this -> input -> post('vmid');
				$data['vm'] = $this -> vm_model -> get_vm_by_vmid($vmid);
				$data['users'] = $this -> users_model -> get_all_users();
				$data['package'] = $this -> package_model -> get_all_package();
				$data['template'] = $this -> template_model -> get_all_template();
				$data['ip'] = $this -> ip_model -> get_ip_by_vmid($vmid);
				$this -> load -> view('header', $data);
				$this -> load -> view('vm/edit', $data);
				$this -> load -> view('footer', $data);
			} else {
				$this -> vm_model -> update_vm();
				redirect('vm/index', 'refresh');
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

	public function delete($vmid) {
		if ($session_data = $this -> authAdmin()) {
			//$this -> input -> post('vmid') = (int)$this -> input -> post('vmid');
			$ip = $this -> ip_model -> release_ip_by_vmid($vmid);
			
			$this -> vm_model -> delete_vm($vmid);
			redirect('vm/index', 'refresh');
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	private function getUserVM() {
		if ($session_data = $this -> auth()) {
			$uid = $session_data['id'];
			return $this -> vm_model -> get_vm_by_uid($uid);
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

	

	public function start($vmname) {

		if ($session_data = $this -> authAdmin()) {
			$this -> vm_model -> powerOn($vmname);
			redirect('vm/index', 'refresh');
		} else if ($session_data = $this -> auth()) {

			$user_vm = $this -> getUserVM();
			foreach ($user_vm as $vm_item) {
				if ($vm_item['vmname'] == $vmname) {
					$this -> vm_model -> powerOn($vmname);
					redirect('vm/index', 'refresh');
				}
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function stop($vmname) {

		if ($session_data = $this -> authAdmin()) {
			$this -> vm_model -> powerOff($vmname);
			redirect('vm/index', 'refresh');
		} else if ($session_data = $this -> auth()) {

			$user_vm = $this -> getUserVM();
			foreach ($user_vm as $vm_item) {
				if ($vm_item['vmname'] == $vmname) {
					$this -> vm_model -> powerOff($vmname);
					redirect('vm/index', 'refresh');
				}
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function reboot($vmname) {

		if ($session_data = $this -> authAdmin()) {
			$this -> vm_model -> reboot($vmname);
			redirect('vm/index', 'refresh');
		} else if ($session_data = $this -> auth()) {

			$user_vm = $this -> getUserVM();
			foreach ($user_vm as $vm_item) {
				if ($vm_item['vmname'] == $vmname) {
					$this -> vm_model -> reboot($vmname);
					redirect('vm/index', 'refresh');
				}
			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function status($vmname) {

		if ($session_data = $this -> authAdmin()) {
			$data['username'] = $session_data['username'];
			$this -> vm_model -> updateStatus($vmname);
			$data['vm_status'] = $this -> vm_model -> get_vm_by_vmname($vmname);
			$data['vm_status']['memory_available'] = 512 - $data['vm_status']['memory_available'] / 8 / 1024 / 1024;
			//$data['vm_status']['thumbnail'] = $data['vm_status']['thumbnail'];
			$this -> load -> view('header', $data);
			$this -> load -> view('vm/vm_status', $data);
			$this -> load -> view('footer');
		} else if ($session_data = $this -> auth()) {
			$data['username'] = $session_data['username'];

			$user_vm = $this -> getUserVM();
			foreach ($user_vm as $vm_item) {
				if ($vm_item['vmname'] == $vmname) {
					$this -> vm_model -> updateStatus($vmname);
					$data['vm_status'] = $this -> vm_model -> get_vm_by_vmname($vmname);
					$data['vm_status']['memory_available'] = 512 - $data['vm_status']['memory_available'] / 8 / 1024 / 1024;
					//$data['vm_status']['thumbnail'] = $data['vm_status']['thumbnail'];
					$this -> load -> view('header', $data);
					$this -> load -> view('vm/vm_status', $data);
					$this -> load -> view('footer');
				}
			}

			// run it

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

}
