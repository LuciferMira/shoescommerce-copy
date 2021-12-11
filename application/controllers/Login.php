<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_users');
	}

	public function index()
	{
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
