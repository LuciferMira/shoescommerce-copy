<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data = array('datauser' => $this->session->userdata(),
									'isi' => 'admin/dashboard/dashboard',
									'title' => 'Dashboard'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($this->session->userdata());
	}
}
