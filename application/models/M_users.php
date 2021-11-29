<?php

class M_users extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}
	function search($table,$where){
		return $this->db->get_where($table,$where);
	}
	function count_admin(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('akses','admin');
		return $this->db->count_all_results();
	}
	function count_users(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('akses','customer');
		return $this->db->count_all_results();
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function delete($table,$id){
		return $this->db->delete($table,array('id_user' => $id));
	}
}
