<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_foto');
		$this->load->model('m_ukuran');
	}

	public function index()
	{
		$dataproduk = $this->m_produk->get_join_foto()->result();
		$data = array('produk' => $dataproduk,
									'isi' => 'produk/list',
									'title' => 'Produk'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
