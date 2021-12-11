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
	function update($table,$data,$id){
		return $this->db->update($table,$data,array('id_user' => $id));
	}
	function Is_already_register($id)
    {
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Update_user_data($data, $id)
    {
        $this->db->where('login_oauth_uid', $id);
        $this->db->update('users', $data);
    }

    function Insert_user_data($data)
    {
        $this->db->insert('users', $data);
    }

}
