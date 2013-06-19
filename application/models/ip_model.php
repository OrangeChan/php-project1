<?php
class Ip_model extends CI_Model {

	public function __construct() {
		$this -> load -> database();
	}

	public function get_all_ip() {
		$query = $this -> db -> get('pj1_ip');
		return $query -> result_array();
	}
	
	public function get_free_ip() {
		$queryTop = $this->db->order_by('ip', 'asc')->get_where('pj1_ip', array('vmid' => NULL), 5)-> result_array();
		$queryBottom = $this->db->order_by('ip', 'desc')->get_where('pj1_ip', array('vmid' => NULL), 5)-> result_array();
		$query =  array_merge($queryTop, $queryBottom);
		return array_unique($query, SORT_REGULAR);
	}

	public function get_ip_by_ipid($ipid) {
		$query = $this -> db -> get_where('pj1_ip', array('ipid' => $ipid));
		return $query -> row_array();
	}

	public function get_ip_by_ip($ip) {
		$query = $this -> db -> get_where('pj1_ip', array('ip' => $ip));
		return $query -> row_array();
	}

	public function get_ip_by_vmid($vmid) {
		$query = $this -> db -> get_where('pj1_ip', array('vmid' => $vmid));
		return $query -> result_array();
	}
	
	public function release_ip_by_vmid($vmid) {

		$data = array('vmid' => NULL);
		$this->db->where('vmid', $vmid);
		$this->db->update('pj1_ip', $data); 		
		return TRUE;
	}

	public function set_ip() {
		$data = array('ip' => $this -> input -> post('ip'), 'vmid' => $this -> input -> post('vmid'));
		return $this -> db -> insert('pj1_ip', $data);
	}

	public function assign_ip($vmid) {
		$data = array('vmid' => $vmid);
		foreach ($this -> input -> post('ip') as $ip_item) {
			$this->db->where('ipid', $ip_item);
			$this->db->update('pj1_ip', $data); 
		}
		return TRUE;
}

}
?>