<?php
class Package_model extends CI_Model {
		
	public function __construct() {
		$this -> load -> database();
	}
		
	public function get_all_package() {
		$query = $this -> db -> get('pj1_package');
		return $query -> result_array();
	}

	public function get_package_by_pid($pid) {
		$query = $this -> db -> get_where('pj1_package', array('pid' => $pid));
		return $query -> row_array();
	}
	
	public function get_template_by_tid($package_name) {
		$query = $this -> db -> get_where('pj1_package', array('package_name' => $package_name));
		return $query -> row_array();
	}
	
	public function set_package() {
		$data = array('package_name' => $this -> input -> post('package_name'));
		return $this -> db -> insert('pj1_package', $data);
	}
	
	public function update_package(){
		$data = array('package_name' => $this -> input -> post('package_name'));
		$this->db->where('pid', $this -> input -> post('pid'));
		$this->db->update('pj1_package', $data); 
	}
}
?>