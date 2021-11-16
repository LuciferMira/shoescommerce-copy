<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_foto');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function add(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$foto = $this->input->post('foto');

		$config['upload_path']      = './assets/upload/produk/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2400';//data kilobyte
		$config['max_width']        = '2024';
		$config['max_height']       = '2024';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$this->session->set_flashdata('failed', 'Upload Foto Gagal');
			redirect(base_url('admin/users/list_admin'));
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail gambar
			$config['image_library']    = 'gd2';
			$config['source_image']     = './assets/upload/produk/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']        = './assets/upload/produk/thumbs/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['width']            = 250;//pixel
			$config['height']           = 250;//pixel
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end thumbnail gambar
			$data = array(
				'id_foto' => NULL,
				'id_produk' => $id,
				'nama_foto' => $nama,
				'foto_produk' => $upload_gambar['upload_data']['file_name'],
		);
		$exe = $this->m_foto->insert('foto',$data);
		if($exe){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/produk/detail/'.$id));
		}else{

		}
		// var_dump($datausers);
		}
	}

	public function delete($id){
		$del = $this->m_produk->delete('produk',$id);
		if($del){
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(base_url('admin/produk/detail/'.$id));
		}else{

		}
		// var_dump($datausers);
	}

}
