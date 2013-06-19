<?php
class Template_model extends CI_Model {
		
	public function __construct() {
		$this -> load -> database();
	}
		
	public function get_all_template() {
		$query = $this -> db -> get('pj1_template');
		return $query -> result_array();
	}

	public function get_template_by_tid($tid) {
		$query = $this -> db -> get_where('pj1_template', array('tid' => $tid));
		return $query -> row_array();
	}
	
	public function get_template_by_template_name($template_name) {
		$query = $this -> db -> get_where('pj1_template', array('template_name' => $template_name));
		return $query -> row_array();
	}
	public function set_template() {
		$data = array('template_name' => $this -> input -> post('template_name'));
		return $this -> db -> insert('pj1_template', $data);
	}
	
	public function update_template(){
		$data = array('template_name' => $this -> input -> post('template_name'));
		$this->db->where('tid', $this -> input -> post('tid'));
		$this->db->update('pj1_template', $data); 
	}
}
?>