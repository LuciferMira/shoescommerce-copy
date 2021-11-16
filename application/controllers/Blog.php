<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$data = array('isi' => 'blog/list',
									'title' => 'Blog'
								);
		$this->load->view('layout/wrapper', $data);
	}
}
