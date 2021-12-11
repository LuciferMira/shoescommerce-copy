<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xendit\Xendit;
require 'vendor/autoload.php';

class Belanja extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_foto');
		$this->load->model('m_ukuran');
		$this->load->model('m_transaksi');

		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("login"));
		// }
	}

	public function index()
	{
		//check pelanggan sudah login / tidak, jika belum akan dialihkan ke halaman registrasi / login dengan session email
		//kondisi sudah login
		if ($this->session->userdata('status') == 'login') {
		$total = 0;
		$keranjang      = $this->cart->contents();
		$datauser = $this->session->userdata();
		foreach($keranjang as $cart){
			$subtotal = $cart['qty']*$cart['price'];
			$total = $total+$subtotal;
		}
				$data = array ( 'kode_transaksi'            => 'TRA'.uniqid(),
												'id_user'              			=> $datauser['id'],
												// 'nama_pelanggan'            => $datauser['nama'],
												// 'email'                     => $datauser['email'],
												// 'telepon'                   => $datauser['telepon'],
												// 'alamat'                    => $datauser['alamat'],
												'total_transaksi'          	=> $total,
												'status'              			=> 'Belum',
												'tanggal_transaksi'         => date('Y-m-d H:i:s')
												);

	//API key Xendit
	Xendit::setApiKey('xnd_development_yIptVIUWtjEGqiM8f5Fwk84yi4CFGUEyinBYYuKYxDBMDJfQ8twCh4A2jWqQHT');

	$params = [
			"external_id" => $data['kode_transaksi'],
			"payer_email" => $datauser['email'],
			"description" => 'Pembayaran Transaksi '.$data['kode_transaksi'],
			"amount" => $data['total_transaksi']+($data['total_transaksi']*10/100),

			//Link Sukses
			"success_redirect_url"=> "http://localhost/shoescommerce-main/home",

			//Link Gagal
			"failure_redirect_url"=> "http://localhost/shoescommerce-main/cart",
		];

		//Pembayaran dan Pembuatan Invoice
		$invoice = \Xendit\Invoice::create($params);

		//Redirect Invoice
		header("Location: ".$invoice["invoice_url"]);


				//proses masuk ke header transaksi
				$this->m_transaksi->insert('transaksi',$data);
				//proses masuk ke table transaksi
				foreach($keranjang as $keranjang) {
						$sub_total = $keranjang['price'] * $keranjang['qty'];

						$data = array(  'kode_transaksi'    => $data['kode_transaksi'],
														'id_produk'         => $keranjang['id'],
														'harga_satuan'      => $keranjang['price'],
														'qty'            		=> $keranjang['qty'],
														'subtotal'       		=> $sub_total,
														);

				$this->m_transaksi->insert('detail_transaksi',$data);
				}
				//end proses masuk ke tabel transaksi
				//setelah masuk ke table transaksi, maka keranjang di kosongkan lagi
				$this->cart->destroy();
				//end pengosongan keranjang
				//update status transaksi
				$this->session->set_flashdata('sukses', 'Checkout berhasil');
				redirect(base_url('belanja/sukses/'.$data->kode_transaksi),'refresh');
		//end masuk database
		}else{
				//kalau belum, wajib registrasi
				$this->session->set_flashdata('failed', 'silahkan login atau registrasi terlebih dahulu');
				redirect(base_url('login'), 'refresh');
		}
	}

	public function sukses(){
		// $kode_transaksi = $kode;
		// $data1 = array(
		// 	'kode_transaksi' => $kode_transaksi,
		// 	'status' => 'lunas',
		// 	'tanggal_bayar' => date('Y-m-d H:i:s')
		// );
		// $this->m_transaksi->update('transaksi', $data1, $kode);
		$data = array(
									'datauser' => $this->session->userdata(),
									'isi' => 'belanja/sukses',
									'title' => 'Sukses Belanja'
								);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
