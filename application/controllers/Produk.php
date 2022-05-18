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
	public function detail($slug_produk)
	{
		$dataproduk = $this->m_produk->read_slug($slug_produk)->row();
		$id_produk  = $dataproduk->id_produk;
		$datafoto = $this->m_foto->search($id_produk)->result();
		$datadetail = $this->m_produk->get_detail_all($id_produk)->result();
		$data = array('produk' => $dataproduk,
									'foto' => $datafoto,
									'detail' => $datadetail,
									'isi' => 'produk/detail',
									'title' => 'Detail Produk'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function cek_stok(){
		$idukuran =$this->input->post('idukuran');
		$warna =$this->input->post('warna');
		$datastok = $this->m_produk->get_stok($idukuran,$warna)->row();
		echo json_encode($datastok);
	}
}
