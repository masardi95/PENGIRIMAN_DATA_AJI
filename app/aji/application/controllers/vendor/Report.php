<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('VendorKantorModel');
	    $this->load->model('VendorPesananModel');
	    $this->load->model('VendorProdukModel');
	    $this->load->model('VendorReportModel');
	    $this->load->model('Mgtvendor_Model');
	    $this->load->model('Kantor_Model');
	    if(empty($this->session->userdata('authenticated'))) {
	      redirect('auth/logout');
	    }
	}

	public function index()
	{
		redirect('auth');
	}

	public function harian()
	{
		$data = array(
			'title'					=> 'Transaksi Harian',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('vendor/report/harian', $data);
	}

	public function bulanan()
	{
		$data = array(
			'title'					=> 'Transaksi Bulanan',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('vendor/report/bulanan', $data);
	}


	public function ajaxreportharian()
	{
		$user 		= $this->session->userdata();
		$vendor 	= $this->Mgtvendor_Model->getUserVendorById($user['idUser']);

		$data = array(
			'dataHarian' => $this->VendorReportModel->fetch_transaksi_harian_vendor($vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/report/ajaxreportharian', $data);
	}

	public function ajaxreportbulanan()
	{
		$user 		= $this->session->userdata();
		$vendor 	= $this->Mgtvendor_Model->getUserVendorById($user['idUser']);

		$data = array(
			'dataBulanan' => $this->VendorReportModel->fetch_transaksi_bulanan_vendor($vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/report/ajaxreportbulanan', $data);
	}




	public function detailTransaksi($tgl)
	{
		$user 		= $this->session->userdata();
		$vendor 	= $this->Mgtvendor_Model->getUserVendorById($user['idUser']);


		$data = array(
			'detailTransaksi' => $this->VendorReportModel->fetchDetailTransaksi($tgl, $vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/report/ajaxdetailtransaksi', $data);
	}




	/*-------------------- CETAK-------------------------*/
	public function cetakHarian()
	{
		$user 		= $this->session->userdata();
		$vendor 	= $this->VendorKantorModel->getKantorByUser($user['idUser']);

		$allHarian 			= $this->VendorReportModel->fetch_transaksi_harian_vendor($vendor->id_vendor);
		$kantor 			= $this->Kantor_Model->getKantorDetail();
		$data = array(
			'title'			=> 'Cetak Transaksi Harian',
			'dataUser'		=> $this->session->userdata(),
			'dataHarian' 	=> $allHarian,
			'kantor'		=> $kantor,
			'vendor'		=> $vendor
		);

		foreach ($allHarian as $val) {
			// ambil detail perhari nya
			$detailHarian = $this->VendorReportModel->fetchDetailTransaksi($val->tgl_kirim, $vendor->id_vendor);
			foreach ($detailHarian as $valHari) {
				$data['detailHarian'][] = array(
					'parentTgl' 	=> $val->tgl_kirim,
					'noTransaksi' 	=> $valHari->no_transaksi,
					'tglKirim' 		=> $valHari->tgl_kirim,
					'tglSelesai' 	=> empty($valHari->tgl_selesai) ? '-' : $valHari->tgl_selesai,
					'tgl_pelunasan'	=> empty($valHari->tgl_pelunasan) ? '-' : $valHari->tgl_pelunasan,
					'jumlah' 		=> $valHari->jumlah,
					'keterangan' 	=> $valHari->keterangan,
					'harga' 		=> $valHari->harga,
					'totalBayar'	=> 'Rp. '.number_format(($valHari->jumlah*$valHari->harga)),
					'nTotalBayar'	=> $valHari->jumlah*$valHari->harga,
				);
			}
		}

		// echo json_encode($data);
		$this->load->view('vendor/report/cetakharian', $data);
	}


	public function cetakbulanan()
	{
		$user 		= $this->session->userdata();
		$vendor 	= $this->VendorKantorModel->getKantorByUser($user['idUser']);

		$allBulanan			= $this->VendorReportModel->fetch_transaksi_bulanan_vendor($vendor->id_vendor);
		$kantor 			= $this->Kantor_Model->getKantorDetail();
		$data = array(
			'title'			=> 'Cetak Transaksi Bulanan',
			'dataUser'		=> $this->session->userdata(),
			'dataBulanan' 	=> $allBulanan,
			'kantor'		=> $kantor,
			'vendor'		=> $vendor
		);

		foreach ($allBulanan as $val) {
			$detailBulanan	= $this->VendorReportModel->fetchDetailTransaksiBulananVendor($val->bulan_kirim, $vendor->id_vendor);
			foreach ($detailBulanan as $valBulanan) {
				$data['detailBulanan'][] = array(
					'parentTgl' 	=> $val->bulan_kirim,
					'hariTransaksi'	=> $valBulanan['hari_kirim'],
					'jumTransaksi'	=> $valBulanan['jum_transaksi'],
					'jumDiterima'	=> $valBulanan['diterima'],
					'jumSelesai'	=> $valBulanan['selesai'],
					'totalHarga'	=> 'Rp. '.number_format($valBulanan['total_harga']),
					'nTotalHarga'	=> $valBulanan['total_harga'],
				);
			}
		}

		// echo json_encode($data);
		$this->load->view('vendor/report/cetakbulanan', $data);
	}


}

/* End of file Report.php */
/* Location: ./application/controllers/vendor/Report.php */