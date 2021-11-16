<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function index()
	{
		$data = array(
									'title' => 'Registrasi'
								);
		$this->load->view('registrasi/register', $data);
	}
}
