<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_users');
	}

	public function index()
	{
		$data = array(
									'title' => 'Login'
								);
		$this->load->view('login/login', $data);
	}

	public function exe_login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
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
				'telepon' => $datauser->telepon,
				'alamat' => $datauser->alamat,
				'tanggal_lahir' => $datauser->tanggal_lahir,
				'tempat_lahir' => $datauser->tempat_lahir,
				'akses' => $datauser->akses,
				'foto' => $datauser->foto,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			if($datauser->akses == 'admin'){
				redirect(base_url("admin/dashboard"));
			}else{
				redirect(base_url("home"));
			}

		}else{
			echo "Email dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
