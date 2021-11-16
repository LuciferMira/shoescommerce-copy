<?php

class M_foto extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}
	function get_one($table){
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->join('produk', 'produk.id_produk = foto.id_produk');
		$this->db->limit(1);
		return $this->db->get();
	}
	function get_join_all(){
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->join('produk', 'produk.id_produk = foto.id_produk');
		return $this->db->get();
	}
	function search($where){
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->join('produk', 'foto.id_produk = produk.id_produk');
		$this->db->where('produk.id_produk', $where);
		return $this->db->get();
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function delete($table,$id){
		return $this->db->delete($table,array('id_produk' => $id));
	}
	function update($table,$data,$id){
		return $this->db->delete($table,$data,array('id_produk' => $id));
	}
}
