<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$dataproduk = $this->m_produk->get_join_foto()->result();
		$data = array(
									'datauser' => $this->session->userdata(),
									'produk' => $dataproduk,
									'isi' => 'home/index',
									'title' => 'Home'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
