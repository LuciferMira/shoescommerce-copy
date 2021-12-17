<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_blog');
	}

	public function index()
	{
		$datablog = $this->m_blog->get_join_all()->result();
		$data = array('blog' => $datablog,
									'isi' => 'blog/list',
									'title' => 'Blog'
								);
		$this->load->view('layout/wrapper', $data);
	}
	public function detail($id)
	{
		$datablog = $this->m_blog->search($id)->row();
		$data = array('blog' => $datablog,
									'isi' => 'blog/detail',
									'title' => 'Detail Blog'
								);
		$this->load->view('layout/wrapper', $data);
	}
}
