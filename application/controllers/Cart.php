<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_foto');
		$this->load->model('m_ukuran');
	}

	public function index()
	{
		$keranjang      = $this->cart->contents();
		// $dataproduk = $this->m_produk->get_join_foto()->result();
		$data = array(
			// 'produk' => $dataproduk,
									'isi' => 'cart/list',
									'keranjang' => $keranjang,
									'title' => 'Keranjang Belanja'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
		var_dump($keranjang);
	}

	public function add()
	{
			//ambil data dari form
			$id_produk             = $this->input->post('id_produk');
			$qty                   = $this->input->post('qty');
			$price                 = $this->input->post('price');
			$name                  = $this->input->post('name');
			$id_detail             = $this->input->post('id_detail');
			$warna                 = $this->input->post('warna');
			$id_ukuran             = $this->input->post('id_ukuran');
			$ukuran                = $this->input->post('ukuran');
			//proses memasukkan ke keranjang belanja
			$data       = array(    'id_produk' => $id_produk,
															'qty'       => $qty,
															'price'     => $price,
															'name'      => $name,
															'id_detail' => $id_detail,
															'warna'     => $warna,
															'id_ukuran' => $id_ukuran,
															'ukuran'    => $ukuran
													);
			$this->cart->insert($data);
			//redirect page
			redirect(base_url('cart'));
	}
}
