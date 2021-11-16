<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ukuran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->model('m_ukuran');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$dataukuran = $this->m_ukuran->get_join_all()->result();
		$datakategori = $this->m_kategori->get_all('kategori')->result();
		$data = array('datauser' => $this->session->userdata(),
									'ukuran'	=> $dataukuran,
									'kategori'	=> $datakategori,
									'isi' => 'admin/ukuran/list',
									'title' => 'List Ukuran'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($dataproduk);
	}

	public function add(){
		$kategori = $this->input->post('kategori');
		$nama = $this->input->post('nama');

		$data = array(
			'id_ukuran' => NULL,
			'id_kategori' => $kategori,
			'nama_ukuran' => $nama,
			'tanggal_dibuat' => date('Y-m-d')
		);
		$exe = $this->m_ukuran->insert('ukuran',$data);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/ukuran/'));
		}else{

		}
		// var_dump($datausers);
		}

		public function delete($id){
			$del = $this->m_ukuran->delete('ukuran',$id);
			if($del){
				$this->session->set_flashdata('success', 'Berhasil dihapus');
				redirect(base_url('admin/ukuran'));
			}else{

			}
			// var_dump($datausers);
		}

		public function detail($id){
			// $where = array('id_ukuran' => $id);
			$dataukuran = $this->m_ukuran->search($id)->row();
			$data = array('datauser' => $this->session->userdata(),
										'ukuran'	=> $dataukuran,
										'isi' => 'admin/ukuran/detail',
										'title' => 'Detail Ukuran'
									);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// var_dump($datausers);
		}

		public function edit($id){
			// $where = array('id_ukuran' => $id);
			$datakategori = $this->m_kategori->get_all('kategori')->result();
			$dataukuran = $this->m_ukuran->search($id)->row();
			$data = array('datauser' => $this->session->userdata(),
										'kategori'	=> $datakategori,
										'ukuran'	=> $dataukuran,
										'isi' => 'admin/ukuran/edit',
										'title' => 'Edit Ukuran'
									);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// var_dump($datausers);
		}

		public function update(){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');

			$data = array(
				'nama_ukuran' => $nama
			);
			$exe = $this->m_ukuran->update('ukuran', $data, $id);
			if($exe){
				$this->session->set_flashdata('success', 'Berhasil diubah');
				redirect(base_url('admin/ukuran'));
			}else{

			}
			// var_dump($datausers);
		}
}
