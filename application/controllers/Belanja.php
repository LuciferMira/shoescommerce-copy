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
		if ($this->session->userdata('nama') != NULL) {
		$total = 0;
		$keranjang      = $this->cart->contents();
		$datauser = $this->session->userdata();
		foreach($keranjang as $cart){
			$subtotal = $cart['qty']*$cart['price'];
			$total = $total+$subtotal;
		}
				$data = array ( 'kode_transaksi'            => 'TRA'.uniqid(),
												'id_user'              			=> $datauser['id'],
												'nama_pelanggan'            => $datauser['nama'],
												'email'                     => $datauser['email'],
												'telepon'                   => $datauser['telepon'],
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
			"success_redirect_url"=> "http://localhost/shoescommerce-main/belanja/sukses",

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
				redirect(base_url('belanja/sukses'),'refresh');
		//end masuk database
		}else{
				//kalau belum, wajib registrasi
				$this->session->set_flashdata('failed', 'silahkan login atau registrasi terlebih dahulu');
				redirect(base_url('login'), 'refresh');
		}
	}

	public function sukses(){
		Xendit::setApiKey('xnd_development_yIptVIUWtjEGqiM8f5Fwk84yi4CFGUEyinBYYuKYxDBMDJfQ8twCh4A2jWqQHT');
		$curl = curl_init();
		// {{xnd_development_yIptVIUWtjEGqiM8f5Fwk84yi4CFGUEyinBYYuKYxDBMDJfQ8twCh4A2jWqQHT}}:{{}};
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.xendit.co/non_fixed_payment_code/simulate_payment',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
			"retail_outlet_name" : "ALFAMART",
			"payment_code" : "JOE1",
			"transfer_amount" : 80000
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
		$data1 = array(
		'status' => 'lunas',
		'tanggal_bayar' => date('Y-m-d H:i:s')
	);
	$this->m_transaksi->update('transaksi', $data1, $_externalId);
	}
}
