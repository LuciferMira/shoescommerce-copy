<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_foto');
		$this->load->model('m_ukuran');

		// if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
		// 	redirect(base_url("login"));
		// }
	}

	public function index()
	{
		$keranjang      = $this->cart->contents();
		// $dataproduk = $this->m_produk->get_join_foto()->result();
		$data = array(
									'datauser' => $this->session->userdata(),
									'isi' => 'cart/list',
									'keranjang' => $keranjang,
									'title' => 'Keranjang Belanja'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function add()
	{
			//ambil data dari form
			$id             			 = $this->input->post('id_produk');
			$qty                   = $this->input->post('qty');
			$price                 = $this->input->post('price');
			$name                  = $this->input->post('name');
			$id_detail             = $this->input->post('id_detail');
			$warna                 = $this->input->post('warna');
			$id_ukuran             = $this->input->post('id_ukuran');
			$ukuran                = $this->input->post('ukuran');
			$foto                	 = $this->input->post('foto');
			//proses memasukkan ke keranjang belanja
			$data       = array(    'id' 				=> $id,
															'qty'       => $qty,
															'price'     => $price,
															'name'      => $name,
															'id_detail' => $id_detail,
															'warna'     => $warna,
															'id_ukuran' => $id_ukuran,
															'ukuran'    => $ukuran,
															'foto'			=> $foto
													);
			$this->cart->insert($data);
			//redirect page
			redirect(base_url('cart'));
	}

	public function hapus($rowid='')
	{
			if($rowid){
			//hapus peritem
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Item telah dihapus');
			redirect(base_url('cart'), 'refresh');
			}else{
			//hapus semua
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'keranjang sudah dihapus');
			redirect(base_url('cart'), 'refresh');
			}
	}

	public function update_cart($rowid)
	{
			//jika ada data unik(rowid)
			if($rowid){
					$data   = array(    'rowid'     => $rowid,
															'qty'       => $this->input->post('qty')
													);
					$this->cart->update($data);
					$this->session->set_flashdata('sukses', 'data telah diupdate');
					redirect(base_url('cart'), 'refresh');
			}else{
					//jika tidak ada rowid
					redirect(base_url('cart'), 'refresh');
			}
	}
}
