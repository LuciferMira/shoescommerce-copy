<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_foto');
		$this->load->model('m_ukuran');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$dataproduk = $this->m_produk->get_join_all()->result();
		$datakategori = $this->m_kategori->get_all('kategori')->result();
		$data = array('datauser' => $this->session->userdata(),
									'produk'	=> $dataproduk,
									'kategori'	=> $datakategori,
									'isi' => 'admin/produk/list',
									'title' => 'List Produk'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($dataproduk);
	}

	public function add(){
		$user = $this->input->post('user');
		$kategori = $this->input->post('kategori');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$slug = strtolower(str_replace(' ','-',$nama));
		$harga = $this->input->post('harga');

		$data = array(
			'id_produk' => NULL,
			'id_user' => $user,
			'id_kategori' => $kategori,
			'kode_produk' => $kode,
			'nama_produk' => $nama,
			'slug_produk' => $slug,
			'harga_produk' => $harga,
			'tanggal_dibuat' => date('Y-m-d'),
			'tanggal_update' => NULL
		);
		$exe = $this->m_produk->insert('produk',$data);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/produk'));
		}else{

		}
		// var_dump($datausers);
	}

	public function delete($id){
		$del = $this->m_produk->delete('produk',$id);
		if($del){
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(base_url('admin/produk'));
		}else{

		}
		// var_dump($datausers);
	}

	public function detail($id){
		$dataproduk = $this->m_produk->search($id)->row();
		$datadetail = $this->m_produk->get_detail_all($id)->result();
		$datakategori = $this->m_kategori->get_all('kategori')->result();
		$dataukuran = $this->m_ukuran->dropdownukuran($dataproduk->id_kategori)->result();
		$datafoto = $this->m_foto->search($id)->result();
		$data = array('datauser' => $this->session->userdata(),
									'produk'	=> $dataproduk,
									'detail' => $datadetail,
									'kategori'	=> $datakategori,
									'ukuran'	=> $dataukuran,
									'foto'	=> $datafoto,
									'isi' => 'admin/produk/detail',
									'title' => 'Detail Produk'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($dataproduk);
	}

	public function edit($id){
		$where = array('id_produk' => $id);
		$dataproduk = $this->m_produk->search('produk',$where)->row();
		$data = array('datauser' => $this->session->userdata(),
									'produk'	=> $datakategori,
									'isi' => 'admin/produk/edit',
									'title' => 'Edit Produk'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($datausers);
	}

	public function update(){
		$user = $this->input->post('user');
		$kategori = $this->input->post('kategori');
		$nama = $this->input->post('nama');
		$slug = strtolower(str_replace(' ','-',$nama));
		$harga = $this->input->post('harga');

		$data = array(
			'id_user' => $user,
			'id_kategori' => $kategori,
			'nama_produk' => $nama,
			'slug_produk' => $slug,
			'harga_produk' => $harga,
			'tanggal_update' => date('Y-m-d')
		);
		$exe = $this->m_produk->update('produk', $data, $id);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(base_url('admin/produk'));
		}else{

		}
		// var_dump($datausers);
	}

	public function add_detail(){
		$id = $this->input->post('id');
		$ukuran = $this->input->post('ukuran');
		$warna = $this->input->post('warna');
		$stok = $this->input->post('stok');

		$data = array(
			'id_detail' => NULL,
			'id_produk' => $id,
			'id_ukuran' => $ukuran,
			'warna' => $warna,
			'stok' => $stok
		);
		$exe = $this->m_produk->insert('detail_produk',$data);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/produk/detail/'.$id));
		}else{

		}
		// var_dump($datausers);
	}
}
