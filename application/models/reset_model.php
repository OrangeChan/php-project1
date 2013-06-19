<?php
class Reset_model extends CI_Model
{
	public function set_reset($nonce) {
		$data = array('email' => $this -> input -> post('email'), 'nonce' => $nonce);
		return $this -> db -> insert('pj1_reset', $data);
	}
	
	public function get_by_nonce() {
		$nonce = $this -> input -> post('nonce');
		$query = $this -> db -> get_where('pj1_reset', array('nonce' => $nonce));
		return $query -> row_array();
	}
}
?>
	