<?php

class M_ukuran extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}
	function get_join_all(){
		$this->db->select('*');
		$this->db->from('ukuran');
		$this->db->join('kategori', 'kategori.id_kategori = ukuran.id_kategori');
		return $this->db->get();
	}
	function dropdownukuran($id){
			return $this->db->get_where('ukuran',array('id_kategori' => $id));
	}
	function search($where){
		$this->db->select('*');
		$this->db->from('ukuran');
		$this->db->join('kategori', 'kategori.id_kategori = ukuran.id_kategori');
		$this->db->where('id_ukuran', $where);
		return $this->db->get();
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function delete($table,$id){
		return $this->db->delete($table,array('id_ukuran' => $id));
	}
	function update($table,$data,$id){
		return $this->db->update($table,$data,array('id_ukuran' => $id));
	}
}
