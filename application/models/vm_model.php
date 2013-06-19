<?php
class Vm_model extends CI_Model {

	public function __construct() {
		$this -> load -> database();
	}

	public function get_all_vm() {
		$query = $this -> db -> get('pj1_vm');
		return $query -> result_array();
	}

	public function get_vm_by_vmid($vmid) {
		$query = $this -> db -> get_where('pj1_vm', array('vmid' => $vmid));
		return $query -> row_array();
	}

	public function get_vm_by_uid($uid) {
		$query = $this -> db -> get_where('pj1_vm', array('uid' => $uid));
		return $query -> result_array();
	}

	public function get_vm_by_vmname($vmname) {
		$query = $this -> db -> get_where('pj1_vm', array('vmname' => $vmname));
		return $query -> row_array();
	}

	public function set_vm() {
		$data = array('vmname' => $this -> input -> post('vmname'), 'package' => $this -> input -> post('package'), 'template' => $this -> input -> post('template'));
		return $this -> db -> insert('pj1_vm', $data);
	}
	
	public function powerOn($vmname) {
		$wmi = new COM('winmgmts://./root/virtualization');
		$obj = $wmi -> ExecQuery("SELECT * FROM Msvm_ComputerSystem WHERE ElementName='{$vmname}'");
		$obj -> ItemIndex(0) -> RequestStateChange(2);
		$obj = null;
	}
	
	public function powerOff($vmname) {
		$wmi = new COM('winmgmts://./root/virtualization');
		$obj = $wmi -> ExecQuery("SELECT * FROM Msvm_ComputerSystem WHERE ElementName='{$vmname}'");
		$obj -> ItemIndex(0) -> RequestStateChange(3);
		$obj = null;
	}
	
	public function reboot($vmname) {
		$wmi = new COM('winmgmts://./root/virtualization');
		$obj = $wmi -> ExecQuery("SELECT * FROM Msvm_ComputerSystem WHERE ElementName='{$vmname}'");
		$obj -> ItemIndex(0) -> RequestStateChange(10);
		$obj = null;
	}
	
	public function updateStatus($vmname) {

		$command = 'wscript.exe D:\statusvm.vbs ' . escapeshellarg($vmname);
		/*
		 * wait for command to return a exit code?
		 *
		 * true = waits for the command to complete, before continuing this script
		 * false = executes command then continues this script without waiting for command to exit
		 *
		 */
		$wait = TRUE;
		$obj = new COM('WScript.Shell');

		if (is_object($obj)) {
			$obj -> Run('cmd /C ' . $command, 0, $wait);
		} else {
			echo 'can not create wshell object';
		}

		$obj = null;
	}
	
	public function update_vm(){
		$data = array('vmname' => $this -> input -> post('vmname'), 'uid' => $this -> input -> post('uid'), 'package' => $this -> input -> post('package'), 'template' => $this -> input -> post('template'));
		$this->db->where('vmid', $this -> input -> post('vmid'));
		$this->db->update('pj1_vm', $data); 
	}
	
	public function delete_vm($vmid){
		$this->db->where('vmid', $vmid);
		$this->db->delete('pj1_vm'); 
	}

}
