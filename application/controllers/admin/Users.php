<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_users');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function list_admin(){
		$where = array('akses' => 'admin');
		$datausers = $this->m_users->search('users',$where)->result();
		$data = array('datauser' => $this->session->userdata(),
									'users'	=> $datausers,
									'isi' => 'admin/users/admin',
									'title' => 'List Admin'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($datausers);
	}

	public function list_user(){
		$where = array('akses' => 'customer');
		$datausers = $this->m_users->search('users',$where)->result();
		$data = array('datauser' => $this->session->userdata(),
									'users'	=> $datausers,
									'isi' => 'admin/users/user',
									'title' => 'List Customer'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($datausers);
	}

	public function add_admin(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$foto = $this->input->post('foto');
		if($foto==NULL){
			$foto = 'default.png';
		}
		$password = md5('123456');

		$config['upload_path']      = './assets/upload/users/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2400';//data kilobyte
		$config['max_width']        = '2024';
		$config['max_height']       = '2024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			// $this->session->set_flashdata('failed', 'Upload Foto Gagal');
			// redirect(base_url('admin/users/list_admin'));

			$data = array(
				'id_user' => NULL,
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
				'telepon' => $telepon,
				'alamat' => $alamat,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'akses' => 'admin',
				'foto' => $foto,
				'tanggal_daftar' => date('Y-m-d'),
				'tanggal_update' => NULL
			);
			$exe = $this->m_users->insert('users',$data);
			if($exe){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect(base_url('admin/users/list_admin'));
			}else{

			}
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail gambar
			$config['image_library']    = 'gd2';
			$config['source_image']     = './assets/upload/users/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']        = './assets/upload/users/thumbs/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['width']            = 250;//pixel
			$config['height']           = 250;//pixel
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end thumbnail gambar

			$data = array(
				'id_user' => NULL,
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
				'telepon' => $telepon,
				'alamat' => $alamat,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'akses' => 'admin',
				'foto' => $upload_gambar['upload_data']['file_name'],
				'tanggal_daftar' => date('Y-m-d'),
				'tanggal_update' => NULL
			);
			$exe = $this->m_users->insert('users',$data);
			if($exe){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect(base_url('admin/users/list_admin'));
			}else{

			}
		}
		// var_dump($datausers);
	}

	public function delete($id){
		$del = $this->m_users->delete('users',$id);
		if($del){
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(base_url('admin/users/list_admin'));
		}else{

		}
		// var_dump($datausers);
	}

	public function detail($id){
		$where = array('id_user' => $id);
		$datausers = $this->m_users->search('users',$where)->row();
		$data = array('datauser' => $this->session->userdata(),
									'users'	=> $datausers,
									'isi' => 'admin/users/detail',
									'title' => 'Detail User'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($datausers);
	}
}
