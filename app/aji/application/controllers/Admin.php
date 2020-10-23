<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('TransaksiModel');
	    if(empty($this->session->userdata('authenticated')) || ($this->session->userdata('isVendor'))) {
	      redirect('auth/logout');
	    }
	}

	// tampilan dashboard admin
	public function index()
	{
		$totTransaksi = $this->TransaksiModel->getCountAllTransaksi(0);
		$totPending = $this->TransaksiModel->getCountAllPending(0);
		$totProses = $this->TransaksiModel->getCountAllProses(0);
		$totSelesai = $this->TransaksiModel->getCountAlldone(0);

		$data = array(
			'title'					=> 'Dashboard',
			'dataUser'				=> $this->session->userdata(),
			'totTransaksi'			=> $totTransaksi,
			'totPending'			=> $totPending,
			'totProses'				=> $totProses,
			'totSelesai'			=> $totSelesai,
		);

		// echo json_encode($data);
		$this->load->view('admin/dashboard', $data);
	}

	
	function generateRandomToken() {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 6; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */