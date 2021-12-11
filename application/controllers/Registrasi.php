<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_users');

	}

	public function index()
	{
		$data = array(
									'title' => 'Registrasi'
								);
		$this->load->view('registrasi/register', $data);
	}
	public function do_regis(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$foto = $this->input->post('foto');
		$password = $this->input->post('password');
		$password = md5($password);
		if($foto==NULL){
			$foto = 'default.png';
		}

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
				'akses' => 'customer',
				'foto' => $foto,
				'tanggal_daftar' => date('Y-m-d'),
				'tanggal_update' => NULL
			);
			$exe = $this->m_users->insert('users',$data);
			if($exe){
				// $this->session->set_flashdata('success', 'Berhasil disimpan');
				// redirect(base_url('login/exe_login'));
				$where = array(
					'email' => $email,
					'password' => $password
				);
				$cek = $this->m_users->search("users",$where)->num_rows();
				$datauser = $this->m_users->search("users",$where)->row();
				// var_dump($datauser);
				if($cek > 0){
					$data_session = array(
						'id' => $datauser->id_user,
						'nama' => $datauser->nama,
						'email' => $datauser->email,
						'telepon' => $datauser->telepon,
						'alamat' => $datauser->alamat,
						'tanggal_lahir' => $datauser->tanggal_lahir,
						'tempat_lahir' => $datauser->tempat_lahir,
						'akses' => $datauser->akses,
						'foto' => $datauser->foto,
						'status' => "login"
					);

					$this->session->set_userdata($data_session);
					redirect(base_url('home'));

				}else{
					redirect(base_url("login"));
				}
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
				'akses' => 'customer',
				'foto' => $upload_gambar['upload_data']['file_name'],
				'tanggal_daftar' => date('Y-m-d'),
				'tanggal_update' => NULL
			);
			$exe = $this->m_users->insert('users',$data);
			if($exe){
				// $this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect(base_url('login/exe_login'));
			}else{

			}
		}
		// var_dump($datausers);
	}
}
