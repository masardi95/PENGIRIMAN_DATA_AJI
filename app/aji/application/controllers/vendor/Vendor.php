<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('VendorKantorModel');
	    $this->load->model('TransaksiModel');
	    $this->load->model('Mgtvendor_Model');
	    if(empty($this->session->userdata('authenticated'))) {
	      redirect('auth/logout');
	    }
	}

	// dashbord vendor
	public function index()
	{

		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);

		$totTransaksi = $this->TransaksiModel->getCountAllTransaksi($vendor->id_vendor);
		$totPending = $this->TransaksiModel->getCountAllPending($vendor->id_vendor);
		$totProses = $this->TransaksiModel->getCountAllProses($vendor->id_vendor);
		$totSelesai = $this->TransaksiModel->getCountAlldone($vendor->id_vendor);

		$data = array(
			'title'					=> 'Dashboard Vendor',
			'dataUser'				=> $this->session->userdata(),
			'totTransaksi'			=> $totTransaksi,
			'totPending'			=> $totPending,
			'totProses'				=> $totProses,
			'totSelesai'			=> $totSelesai,
		);		// echo json_encode($data);
		$this->load->view('vendor/dashboard', $data);
	}

	// tampilan halaman profil vendor
	public function kantor()
	{
		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);
		$data = array(
			'title'			=> 'Kantor Vendor',
			'dataUser'		=> $this->session->userdata(),
			'vendor'		=> $vendor
		);
		// echo json_encode($data);
		$this->load->view('vendor/kantor/kantor', $data);
	}

	// eksekusi edit detail data vendor
	public function dovendor()
	{
		$idVendor = $this->input->post('idVendor');
		$isi = array( 
			'nama_vendor' 		=> $this->input->post('namaVendor'), 
			'email_vendor' 		=> $this->input->post('emailVendor'), 
			'alamat_vendor' 	=> $this->input->post('alamatVendor')
		);

		if ($this->VendorKantorModel->updateVendor($idVendor, $isi)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil update Vendor', 
			);
			redirect('vendor/vendor/kantor');
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal update Vendor', 
			);
		}

		echo json_encode($data);
	}

	// cari data vendor berdasarkan id vendor
	public function getUserVendorById($idUser)
	{
		echo json_encode($this->Mgtvendor_Model->getUserVendorById($idUser));		
	}
}

/* End of file Vendor.php */
/* Location: ./application/controllers/vendor/Vendor.php */