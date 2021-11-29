<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_users');
		$this->load->model('m_transaksi');
		$this->load->model('m_produk');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$dataadmin = $this->m_users->count_admin();
		$datauser = $this->m_users->count_users();
		$dataproduk = $this->m_produk->count_produk();
		$datatransaksi = $this->m_transaksi->count_transaksi();
		$datadetail = $this->m_transaksi->get_all_detail_trans()->result();
		$data = array('datauser' => $this->session->userdata(),
									'admin' => $dataadmin,
									'user' => $datauser,
									'produk' => $dataproduk,
									'transaksi' => $datatransaksi,
									'detail' => $datadetail,
									'isi' => 'admin/dashboard/dashboard',
									'title' => 'Dashboard'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($this->session->userdata());
	}
}
