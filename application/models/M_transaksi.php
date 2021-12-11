<?php

class M_transaksi extends CI_Model{

	function get_all($table){
		return $this->db->get($table);
	}
	function get_join_all(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('users', 'users.id_user = transaksi.id_transaksi');
		return $this->db->get();
	}
	function count_transaksi(){
		$this->db->select('*');
		$this->db->from('transaksi');
		// $this->db->where('akses','customer');
		return $this->db->count_all_results();
	}
	function get_join_search($where){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('users', 'users.id_user = transaksi.id_transaksi');
		$this->db->where('id_transaksi', $where);
		return $this->db->get();
	}
	function get_all_detail($where){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi', 'detail_transaksi.kode_transaksi = transaksi.kode_transaksi');
		$this->db->join('produk', 'detail_transaksi.id_produk = produk.id_produk');
		$this->db->where('id_transaksi', $where);
		return $this->db->get();
	}
	function get_all_detail_trans(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi', 'detail_transaksi.kode_transaksi = transaksi.kode_transaksi');
		$this->db->join('produk', 'detail_transaksi.id_produk = produk.id_produk');
		return $this->db->get();
	}
	function search($table,$where){
		return $this->db->get_where($table,$where);
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	// function delete($table,$id){
	// 	return $this->db->delete($table,array('id_kategori' => $id));
	// }
	function update($table,$data,$kode){
		return $this->db->update($table,$data,array('kode_transaksi' => $kode));
	}
}
