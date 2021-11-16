<?php

class M_users extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}
	function search($table,$where){
		return $this->db->get_where($table,$where);
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function delete($table,$id){
		return $this->db->delete($table,array('id_user' => $id));
	}
}
