<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$data = array('isi' => 'contact/contact',
									'title' => 'Contact Us'
								);
		$this->load->view('layout/wrapper', $data);
	}

	public function return()
	{
		$data = array('isi' => 'contact/return',
									'title' => 'Return Barang'
								);
		$this->load->view('layout/wrapper', $data);
	}
}
