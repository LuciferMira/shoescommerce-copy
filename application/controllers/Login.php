<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_users');
		$this->load->model('m_transaksi');
	}

	public function index()
	{
		include_once APPPATH . "../vendor/autoload.php";
		  $google_client = new Google_Client();
		  $google_client->setClientId('388926786174-v17sp557ko09b0njufhifnp5cbcon8hn.apps.googleusercontent.com'); //masukkan ClientID anda
		  $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
		  $google_client->setRedirectUri('http://localhost/shoescommerce-main/login'); //Masukkan Redirect Uri anda
		  $google_client->addScope('email');
		  $google_client->addScope('profile');
			if(isset($_GET["code"]))
        {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
                if(!isset($token["error"]))
                {
                    $google_client->setAccessToken($token['access_token']);
                    $this->session->set_userdata('access_token', $token['access_token']);
                    $google_service = new Google_Service_Oauth2($google_client);
										$data = $google_service->userinfo->get();
										$current_datetime = date('Y-m-d H:i:s');
                    if($this->m_users->Is_already_register($data['id'])){
											$datadaridb = $this->m_users->searchid($data['id'])->row();
                    	//update data
	                    $user_data = array(
												'nama'  => $data['given_name']." ".$data['family_name'],
		                    'email'  => $data['email'],
												'telepon' => $data['telepon'],
												'alamat' => $data['alamat'],
												'tanggal_lahir' => $data['tanggal_lahir'],
												'tempat_lahir' => $data['tempat_lahir'],
												'akses' => 'customer',
		                    'foto' => $data['picture'],
		                    'tanggal_update'  => $current_datetime
	                    );

											$this->m_users->Update_user_data($user_data, $data['id']);
											$idu = $datadaridb->id_user;
											$user_data += ['id' => $idu];
											$user_data += ['status' => "login"];
                    }else{
	                    //insert data
	                    $user_data = array(
	                    'login_oauth_uid' => $data['id'],
	                    'nama'  => $data['given_name']." ".$data['family_name'],
	                    'email'  => $data['email'],
											'telepon' => $data['telepon'],
											'alamat' => $data['alamat'],
											'tanggal_lahir' => $data['tanggal_lahir'],
											'tempat_lahir' => $data['tempat_lahir'],
											'akses' => 'customer',
	                    'foto' => $data['picture'],
	                    'tanggal_daftar'  => $current_datetime
	                    );

                    	$this->m_users->Insert_user_data($user_data);
											$datadaridb = $this->m_users->searchid($data['id'])->row();
											$idu = $datadaridb->id_user;
											$user_data += ['id' => $idu];
											$user_data += ['status' => "login"];
                    }
                    $this->session->set_userdata($user_data);
								}
								if(!$this->session->userdata('access_token'))
		                {
												redirect(base_url('login'));
		                }
		                else
		                {
												redirect(base_url());
		                }
				}
		$data = array(
									'title' => 'Login',
									'google_btn' => $google_client->createAuthUrl()
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
			if($datauser->akses == 'admin'){
				redirect(base_url("admin/dashboard"));
			}else{
				redirect(base_url("home"));
			}

		}else{
			redirect(base_url("login"));
		}
	}

	function profile(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$data = array('datauser' => $this->session->userdata(),
									'isi' => 'account/profile',
									'title' => 'My Profile'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	function admin_profile(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$data = array('datauser' => $this->session->userdata(),
									'isi' => 'admin/users/profile',
									'title' => 'My Profile'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	function history(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$id = $this->session->userdata('id');
		$datatransaksi = $this->m_transaksi->get_history($id);
		$data = array('datauser' => $this->session->userdata(),
									'transaksi' => $datatransaksi,
									'isi' => 'account/history',
									'title' => 'History Transaksi'
								);
		// var_dump($datatransaksi);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function update(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tmpt_lahir = $this->input->post('tmpt_lahir');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama' => $nama,
			'telepon' => $telp,
			'alamat' => $alamat,
			'tanggal_lahir' => $tgl_lahir,
			'tempat_lahir' => $tmpt_lahir
		);
		$exe = $this->m_users->update('users', $data, $id);
		if($exe){
			$where = array(
				'id_user' => $id,
			);
			$cek = $this->m_users->search("users",$where)->num_rows();
			$datauser1 = $this->m_users->search("users",$where)->row();
			if($cek > 0){
				$data_session = array(
					'id' => $datauser1->id_user,
					'nama' => $datauser1->nama,
					'email' => $datauser1->email,
					'telepon' => $datauser1->telepon,
					'alamat' => $datauser1->alamat,
					'tanggal_lahir' => $datauser1->tanggal_lahir,
					'tempat_lahir' => $datauser1->tempat_lahir,
					'akses' => $datauser1->akses,
					'foto' => $datauser1->foto,
					'status' => "login"
				);
			}
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('success', 'Berhasil diubah');
			redirect(base_url('login/profile'));
		}else{

		}
		// var_dump($datausers);
	}

	public function update_admin(){
		if($this->session->userdata('status') != "login" AND $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tmpt_lahir = $this->input->post('tmpt_lahir');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$gambar = $this->input->post('gambar');
		if($gambar==NULL){
			$gambar = 'default.png';
		}

		$config['upload_path']      = './assets/upload/users/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2400';//data kilobyte
		$config['max_width']        = '2024';
		$config['max_height']       = '2024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			$data = array(
				'nama' => $nama,
				'telepon' => $telp,
				'alamat' => $alamat,
				'tanggal_lahir' => $tgl_lahir,
				'tempat_lahir' => $tmpt_lahir,
				'foto' => $gambar
			);
			$exe = $this->m_users->update('users', $data, $id);
			if($exe){
				$where = array(
					'id_user' => $id,
				);
				$cek = $this->m_users->search("users",$where)->num_rows();
				$datauser1 = $this->m_users->search("users",$where)->row();
				if($cek > 0){
					$data_session = array(
						'id' => $datauser1->id_user,
						'nama' => $datauser1->nama,
						'email' => $datauser1->email,
						'telepon' => $datauser1->telepon,
						'alamat' => $datauser1->alamat,
						'tanggal_lahir' => $datauser1->tanggal_lahir,
						'tempat_lahir' => $datauser1->tempat_lahir,
						'akses' => $datauser1->akses,
						'foto' => $datauser1->foto,
						'status' => "login"
					);
				}
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('success', 'Berhasil diubah');
				redirect(base_url('login/admin_profile'));
			}else{
				$this->session->set_flashdata('failed', 'Foto Gagal diupload');
				redirect(base_url('login/admin_profile'));
			}
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail gambar
			$config['image_library']    = 'gd2';
			$config['source_image']     = './assets/upload/blog/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']        = './assets/upload/blog/thumbs/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['width']            = 250;//pixel
			$config['height']           = 250;//pixel
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end thumbnail gambar

			$data = array(
				'nama' => $nama,
				'telepon' => $telp,
				'alamat' => $alamat,
				'tanggal_lahir' => $tgl_lahir,
				'tempat_lahir' => $tmpt_lahir,
				'foto' => $upload_gambar['upload_data']['file_name'],
			);
			$exe = $this->m_users->update('users', $data, $id);
			if($exe){
				$where = array(
					'id_user' => $id,
				);
				$cek = $this->m_users->search("users",$where)->num_rows();
				$datauser1 = $this->m_users->search("users",$where)->row();
				if($cek > 0){
					$data_session = array(
						'id' => $datauser1->id_user,
						'nama' => $datauser1->nama,
						'email' => $datauser1->email,
						'telepon' => $datauser1->telepon,
						'alamat' => $datauser1->alamat,
						'tanggal_lahir' => $datauser1->tanggal_lahir,
						'tempat_lahir' => $datauser1->tempat_lahir,
						'akses' => $datauser1->akses,
						'foto' => $datauser1->foto,
						'status' => "login"
					);
				}
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('success', 'Berhasil diubah');
				redirect(base_url('login/admin_profile'));
			}else{
				// $this->session->set_flashdata('failed', 'Foto Gagal diupload');
				// redirect(base_url('login/admin_profile'));
			}
		}
			// var_dump($datausers);
	}

	function form_pass(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$data = array('datauser' => $this->session->userdata(),
									'isi' => 'admin/users/change_password',
									'title' => 'Change Password'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function update_pass(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$id = $this->input->post('id');
		$old_pass = md5($this->input->post('old_pass'));
		$new_pass = $this->input->post('new_pass');
		$conf_pass = $this->input->post('conf_pass');
		$where = array(
			'id_user' => $id,
		);
		$cek = $this->m_users->search("users",$where)->num_rows();
		$datauser1 = $this->m_users->search("users",$where)->row();

		$data = array(
			'password' => md5($new_pass),
		);
		if($old_pass == $datauser1->password AND $new_pass == $conf_pass){
			$exe = $this->m_users->update('users', $data, $id);
			if($exe){
				if($this->session->userdata('akses') == 'admin'){
					$this->session->set_flashdata('success', 'Berhasil diubah');
					redirect(base_url('login/form_pass'));
				}else{
					$this->session->set_flashdata('success', 'Berhasil diubah');
					redirect(base_url('login/profile'));
				}
			}else{

			}
		}
		// var_dump($datausers);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function login_google(){
		include_once APPPATH . "../vendor/autoload.php";
		  $google_client = new Google_Client();
		  $google_client->setClientId('388926786174-v17sp557ko09b0njufhifnp5cbcon8hn.apps.googleusercontent.com'); //masukkan ClientID anda
		  $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
		  $google_client->setRedirectUri('http://localhost/shoescommerce-main/login/login_google'); //Masukkan Redirect Uri anda
		  $google_client->addScope('email');
		  $google_client->addScope('profile');

			if(isset($_GET["code"]))
        {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
                if(!isset($token["error"]))
                {
                    $google_client->setAccessToken($token['access_token']);
                    $this->session->set_userdata('access_token', $token['access_token']);
                    $google_service = new Google_Service_Oauth2($google_client);
                    $data = $google_service->userinfo->get();
                    $current_datetime = date('Y-m-d H:i:s');
                    if($this->m_users->Is_already_register($data['id'])){
                    	//update data
	                    $user_data = array(
												'nama'  => $data['given_name']." ".$data['family_name'],
		                    'email'  => $data['email'],
												'akses' => 'customer',
		                    'foto' => $data['picture'],
		                    'tanggal_update'  => $current_datetime
	                    );

                    	$this->m_users->Update_user_data($user_data, $data['id']);
                    }else{
	                    //insert data
	                    $user_data = array(
	                    'login_oauth_uid' => $data['id'],
	                    'nama'  => $data['given_name']." ".$data['family_name'],
	                    'email'  => $data['email'],
											'akses' => 'customer',
	                    'foto' => $data['picture'],
	                    'tanggal_daftar'  => $current_datetime
	                    );

                    	$this->m_users->Insert_user_data($user_data);
                    }
                    $this->session->set_userdata($user_data);
                }
        }
            $login_button = '';
            if(!$this->session->userdata('access_token'))
                {
										// $data = array(
										// 						'title' => 'Login'
										// );
                    // $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'assets/google_btn_rapih.png" /></a>';
                    // $data['login_button'] = $login_button;
                    // $this->load->view('login/google_login', $data);
										// $this->load->view('login/login', $data);
										redirect(base_url('login'));
                }
                else
                {
                    // $this->load->view('login/google_login');
										redirect(base_url());
                }
	}
}
