<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('VendorKantorModel');
	    $this->load->model('VendorPesananModel');
	    $this->load->model('VendorProdukModel');
	    if(empty($this->session->userdata('authenticated'))) {
	      redirect('auth/logout');
	    }
	}

	// tampilan produk vendor
	public function index()
	{
		$data = array(
			'title'					=> 'Dashboard Vendor',
			'dataUser'				=> $this->session->userdata(),
		);
		// echo json_encode($data);
		$this->load->view('vendor/produk/produk', $data);
	}

	// cari produk vendor tersebut
	public function fetchProdukVendor()
	{
		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);
		$data = array(
			'dataProduk' => $this->VendorProdukModel->fetchProdukByIdVendor($vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/produk/ajaxproduk', $data);
	}

	// ambil produk vendor tersebut berdasarkan id produk
	public function getprodukbyid($idProduk)
	{
		echo json_encode($this->VendorProdukModel->getprodukbyid($idProduk));
	}

	// untuk menambah dan mengedit produk
	public function doProduk()
	{
		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);

		$idProduk = $this->input->post('idProduct');
		$isi = array(
			'id_vendor' 	=> $vendor->id_vendor, 
			'nama_product' 	=> $this->input->post('namaProduct'), 
			'ukuran' 		=> $this->input->post('ukuran'), 
			'bahan' 		=> $this->input->post('bahan'), 
			'harga' 		=> $this->input->post('harga'), 
		);

		if (empty($idProduk)) {
			if ($this->VendorProdukModel->isiProduct($isi)) {
				$data = array(
					'result' => true, 
					'message' => 'Berhasil isi product', 
				);
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal isi product', 
				);
			}
		}else{
			if ($this->VendorProdukModel->update($idProduk, $isi)) {
				$data = array(
					'result' => true, 
					'message' => 'Berhasil update product', 
				);
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal update product', 
				);
			}
		}

		echo json_encode($data);
	}

	// soft delete product
	public function hapus($idProduk)
	{
		$isi = array('deleted' => 1);

		if ($this->VendorProdukModel->update($idProduk, $isi)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil hapus product', 
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal hapus product', 
			);
		}

		echo json_encode($data);
	}



}

/* End of file Produk.php */
/* Location: ./application/controllers/vendor/Produk.php */