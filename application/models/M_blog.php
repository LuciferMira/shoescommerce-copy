<?php

class M_blog extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}
	function get_join_all(){
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->join('users', 'users.id_user = blog.id_user');
		return $this->db->get();
	}
	function dropdownukuran($id){
			return $this->db->get_where('ukuran',array('id_kategori' => $id));
	}
	function search($where){
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->join('users', 'users.id_user = blog.id_user');
		$this->db->where('id_blog', $where);
		return $this->db->get();
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function delete($table,$id){
		return $this->db->delete($table,array('id_blog' => $id));
	}
	function update($table,$data,$id){
		return $this->db->update($table,$data,array('id_blog' => $id));
	}
}
