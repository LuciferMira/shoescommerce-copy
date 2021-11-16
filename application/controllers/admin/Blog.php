<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_blog');

		if($this->session->userdata('status') != "login" OR $this->session->userdata('akses') != "admin"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$datablog = $this->m_blog->get_join_all()->result();
		$data = array('datauser' => $this->session->userdata(),
									'blog'	=> $datablog,
									'isi' => 'admin/blog/list',
									'title' => 'List Blog'
								);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// var_dump($dataproduk);
	}

	public function add(){
		$id_user = $this->input->post('id');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$gambar = $this->input->post('gambar');
		if($gambar==NULL){
			$gambar = 'default.png';
		}

		$config['upload_path']      = './assets/upload/blog/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2400';//data kilobyte
		$config['max_width']        = '2024';
		$config['max_height']       = '2024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			$data = array(
				'id_blog' => NULL,
				'id_user' => $id_user,
				'judul_blog' => $judul,
				'isi_blog' => $isi,
				'gambar_blog' => $gambar,
				'tanggal_dibuat' => date('Y-m-d'),
				'tanggal_diubah' => NULL
			);

			$exe = $this->m_blog->insert('blog',$data);
			if($exe){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect(base_url('admin/blog/'));
			}else{

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
				'id_blog' => NULL,
				'id_user' => $id_user,
				'judul_blog' => $judul,
				'isi_blog' => $isi,
				'gambar_blog' => $upload_gambar['upload_data']['file_name'],
				'tanggal_dibuat' => date('Y-m-d'),
				'tanggal_diubah' => NULL
			);
			$exe = $this->m_blog->insert('blog',$data);
			if($exe){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect(base_url('admin/blog'));
			}else{

			}
		}
		// var_dump($datausers);
		}

		public function delete($id){
			$del = $this->m_blog->delete('blog',$id);
			if($del){
				$this->session->set_flashdata('success', 'Berhasil dihapus');
				redirect(base_url('admin/blog'));
			}else{

			}
			// var_dump($datausers);
		}

		public function detail($id){
			$datablog = $this->m_blog->search($id)->row();
			$data = array('datauser' => $this->session->userdata(),
										'blog'	=> $datablog,
										'isi' => 'admin/blog/detail',
										'title' => 'Detail Blog'
									);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// var_dump($datausers);
		}

		public function edit($id){
			// $where = array('id_ukuran' => $id);
			$datablog = $this->m_blog->search($id)->row();
			$data = array('datauser' => $this->session->userdata(),
										'blog'	=> $datablog,
										'isi' => 'admin/blog/edit',
										'title' => 'Edit Blog'
									);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// var_dump($datausers);
		}

		public function update(){
			$id = $this->input->post('id');
			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$gambar = $this->input->post('gambar');

			$config['upload_path']      = './assets/upload/blog/';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = '2400';//data kilobyte
			$config['max_width']        = '2024';
			$config['max_height']       = '2024';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				$data = array(
					'judul_blog' => $judul,
					'isi_blog' => $isi,
					'tanggal_diubah' => date('Y-m-d')
				);

				$exe = $this->m_blog->update('blog',$data,$id);
				if($exe){
					$this->session->set_flashdata('success', 'Berhasil disimpan');
					redirect(base_url('admin/blog'));
				}else{

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
					'judul_blog' => $judul,
					'isi_blog' => $isi,
					'gambar_blog' => $upload_gambar['upload_data']['file_name'],
					'tanggal_diubah' => date('Y-m-d')
				);
				$exe = $this->m_blog->update('blog',$data,$id);
				if($exe){
					$this->session->set_flashdata('success', 'Berhasil disimpan');
					redirect(base_url('admin/blog'));
				}else{

				}
			}
			// var_dump($datausers);
		}
}
