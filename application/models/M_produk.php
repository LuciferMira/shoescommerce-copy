<?php

class M_produk extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}

	function read_slug($where){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->where('slug_produk', $where);
		return $this->db->get();
	}

	function count_produk(){
		$this->db->select('*');
		$this->db->from('produk');
		return $this->db->count_all_results();
	}

	function get_join_all(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		return $this->db->get();
	}
	function get_join_foto(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('foto', 'produk.id_produk = foto.id_produk');
		$this->db->group_by('nama_produk');
		$this->db->limit(4);
		return $this->db->get();
	}
	function search($where){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->where('id_produk', $where);
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
	function get_detail_all($where){
		$this->db->select('*');
		$this->db->from('detail_produk');
		$this->db->join('produk', 'produk.id_produk = detail_produk.id_produk');
		$this->db->join('ukuran', 'ukuran.id_ukuran = detail_produk.id_ukuran');
		$this->db->where('produk.id_produk', $where);
		return $this->db->get();
	}
}
