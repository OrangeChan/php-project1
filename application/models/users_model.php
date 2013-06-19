<?php
class Users_model extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('uid, email, pass, salt, level, status');
   $this -> db -> from('pj1_users');
   $this -> db -> where('email', $username);
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   $user = $query->row_array();

   if($query -> num_rows() == 1)
   {
		$saltPassword = hash_hmac('sha1', $password, $user['salt']);
		if($saltPassword == $user['pass'])
			return $query->result();
		else {
			return false;
		}
   }
   else
   {
     return false;
   }
 }
 public function __construct() {
		$this -> load -> database();
	}

	public function get_all_users() {
		$query = $this -> db -> get('pj1_users');
		return $query -> result_array();
	}

	public function get_users_by_uid($uid) {
		$query = $this -> db -> get_where('pj1_users', array('uid' => $uid));
		return $query -> row_array();
	}

	public function get_users_by_email($email) {
		$query = $this -> db -> get_where('pj1_users', array('email' => $email));
		return $query -> row_array();
	}

	public function set_users() {
		
		$salt = mt_rand();
		$password = hash_hmac('sha1', $this -> input -> post('password'), $salt);
		$data = array('email' => $this -> input -> post('username'), 'pass' => $password, 'salt' => $salt);
		return $this -> db -> insert('pj1_users', $data);
	}
	
	public function update_users(){
		$query = $this -> db -> get_where('pj1_users', array('uid' => $this -> input -> post('uid')));
		$user = $query -> row_array();
		if($this -> input -> post('password')){
		$password = hash_hmac('sha1', $this -> input -> post('password'), $user['salt']);
		$data = array('email' => $this -> input -> post('username'), 'pass' => $password, 'status' => $this -> input -> post('status'));
		}
		else{
			$data = array('email' => $this -> input -> post('username'), 'status' => $this -> input -> post('status'));
		}
		$this->db->where('uid', $this -> input -> post('uid'));
		return $this -> db -> update('pj1_users', $data);
	}
	
	public function reset_pw($record){
		$query = $this -> db -> get_where('pj1_users', array('email' => $this -> input -> $record['email']));
		$user = $query -> row_array();
		$password = hash_hmac('sha1', $this -> input -> post('password'), $user['salt']);
		$data = array('pass' => $password);
		$this->db->where('email', $record['email']);
		return $this -> db -> update('pj1_users', $data);
	}
	
	public function change_pw($uid){
		$query = $this -> db -> get_where('pj1_users', array('uid' => $uid));
		$user = $query -> row_array();
		$password = hash_hmac('sha1', $this -> input -> post('new_password'), $user['salt']);
		$data = array('pass' => $password);
		$this->db->where('uid', $uid);
		return $this -> db -> update('pj1_users', $data);
	}

	public function delete_users($uid){
		$this->db->where('uid', $uid);
		$this->db->delete('pj1_users'); 
	}
 
}
?>