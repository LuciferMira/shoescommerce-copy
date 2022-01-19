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
		// Xendit::setApiKey('xnd_development_yIptVIUWtjEGqiM8f5Fwk84yi4CFGUEyinBYYuKYxDBMDJfQ8twCh4A2jWqQHT');
		//
		// $getAllInvoice = \Xendit\Invoice::retrieveAll();

// This will be your Callback Verification Token you can obtain from the dashboard.
// Make sure to keep this confidential and not to reveal to anyone.
// This token will be used to verify the origin of request validity is really from Xendit
$xenditXCallbackToken = 'bfb1c2eeb5f12a54197a54db52fd32825a07b89e06ae9df0925b4e39cbe8ada2';

// This section is to get the callback Token from the header request,
// which will then later to be compared with our xendit callback verification token
$reqHeaders = getallheaders();
$xIncomingCallbackTokenHeader = isset($reqHeaders['x-callback-token']) ? $reqHeaders['x-callback-token'] : "";

// In order to ensure the request is coming from xendit
// You must compare the incoming token is equal with your xendit callback verification token
// This is to ensure the request is coming from Xendit and not from any other third party.
if($xIncomingCallbackTokenHeader === $xenditXCallbackToken){
  // Incoming Request is verified coming from Xendit
  // You can then perform your checking and do the necessary,
  // such as update your invoice records

  // This line is to obtain all request input in a raw text json format
  $rawRequestInput = file_get_contents("php://input");
  // This line is to format the raw input into associative array
  $arrRequestInput = json_decode($rawRequestInput, true);
  print_r($arrRequestInput);

  $_id = $arrRequestInput['id'];
  $_externalId = $arrRequestInput['external_id'];
  $_userId = $arrRequestInput['user_id'];
  $_status = $arrRequestInput['status'];
  $_paidAmount = $arrRequestInput['paid_amount'];
  $_paidAt = $arrRequestInput['paid_at'];
  $_paymentChannel = $arrRequestInput['payment_channel'];
  $_paymentDestination = $arrRequestInput['payment_destination'];
	// echo $_externalId;
	// $data1 = array(
	// 	'status' => 'lunas',
	// 	'tanggal_bayar' => date('Y-m-d H:i:s')
	// );
	// $this->m_transaksi->update('transaksi', $data1, $_externalId);
  // You can then retrieve the information from the object array and use it for your application requirement checking

}else{
  // Request is not from xendit, reject and throw http status forbidden
  http_response_code(403);
}

		// $data = array(
		// 							'datauser' => $this->session->userdata(),
		// 							'isi' => 'belanja/sukses',
		// 							'title' => 'Sukses Belanja'
		// 						);
		// $this->load->view('layout/wrapper', $data, FALSE);
  	// var_dump(($getAllInvoice));
	}
}
