<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data = array('isi' => 'about/about',
									'title' => 'About Us'
								);
		$this->load->view('layout/wrapper', $data);
	}
}
