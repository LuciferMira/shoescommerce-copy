<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xendit\Xendit;
require 'vendor/autoload.php';

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$datatransaksi = $this->m_transaksi->get_join_all('transaksi')->result();
		$data = array('datauser' => $this->session->userdata(),
									'transaksi'	=> $datatransaksi,
									'isi' => 'admin/transaksi/list',
									'title' => 'List Transaksi'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
			// Xendit::setApiKey('xnd_development_yIptVIUWtjEGqiM8f5Fwk84yi4CFGUEyinBYYuKYxDBMDJfQ8twCh4A2jWqQHT');
			// $getBalance = \Xendit\Transaction::getTransaction();
  		// var_dump($getBalance);

	}

	public function add(){
		$nama = $this->input->post('nama');
		$slug = strtolower(str_replace(' ','-',$nama));

		$data = array(
			'id_kategori' => NULL,
			'nama_kategori' => $nama,
			'slug_kategori' => $slug,
			'tanggal_buat' => date('Y-m-d'),
			'tanggal_update' => NULL
		);
		$exe = $this->m_kategori->insert('kategori',$data);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/kategori'));
		}else{

		}
		// var_dump($datausers);
	}
	public function delete($id){
		$del = $this->m_kategori->delete('kategori',$id);
		if($del){
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(base_url('admin/kategori'));
		}else{

		}
		// var_dump($datausers);
	}

	public function detail($id){
		$where = array('id_kategori' => $id);
		$datakategori = $this->m_kategori->search('kategori',$where)->row();
		$data = array('datauser' => $this->session->userdata(),
									'kategori'	=> $datakategori,
									'isi' => 'admin/kategori/detail',
									'title' => 'Detail Kategori'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($datausers);
	}

	public function edit($id){
		$where = array('id_kategori' => $id);
		$datakategori = $this->m_kategori->search('kategori',$where)->row();
		$data = array('datauser' => $this->session->userdata(),
									'kategori'	=> $datakategori,
									'isi' => 'admin/kategori/edit',
									'title' => 'Edit Kategori'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($datausers);
	}

	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$slug = strtolower(str_replace(' ','-',$nama));

		$data = array(
			'nama_kategori' => $nama,
			'tanggal_update' => date('Y-m-d')
		);
		$exe = $this->m_kategori->update('kategori', $data, $id);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(base_url('admin/kategori'));
		}else{

		}
		// var_dump($datausers);
	}
}
