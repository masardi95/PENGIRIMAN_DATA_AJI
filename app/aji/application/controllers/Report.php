<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('ReportModel');
	    $this->load->model('Kantor_Model');
	    if(empty($this->session->userdata('authenticated')) || ($this->session->userdata('isVendor'))) {
	      redirect('auth/logout');
	    }
	}

	public function index()
	{
		redirect('admin','refresh');   
	}

	// tampilan report harian
	public function harian()
	{
		$data = array(
			'title'					=> 'Transaksi Harian',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/report/harian', $data);
	}

	// tampilan report bulan
	public function bulanan()
	{
		$data = array(
			'title'					=> 'Transaksi Bulanan',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/report/bulanan', $data);
	}

	// ambil data report harian dari database
	public function ajaxReportHarian()
	{
		$data = array(
			'dataHarian' => $this->ReportModel->fetch_transaksi_harian()
		);
		// echo json_encode($data);
		$this->load->view('admin/report/ajaxreportharian', $data);
	}

	// ambil data report bulanan dari database
	public function ajaxReportBulanan()
	{
		$data = array(
			'dataBulanan' => $this->ReportModel->fetch_transaksi_bulanan()
		);
		// echo json_encode($data);
		$this->load->view('admin/report/ajaxreportbulanan', $data);
	}

	// ambil data transaksi berdasarkan tanggal
	public function detailTransaksi($tgl)
	{
		$data = array(
			'detailTransaksi' => $this->ReportModel->fetchDetailTransaksi($tgl)
		);
		// echo json_encode($data);
		$this->load->view('admin/report/ajaxdetailtransaksi', $data);
	}



	/*-------------------- CETAK-------------------------*/
	public function cetakHarian()
	{
		$allHarian 			= $this->ReportModel->fetch_transaksi_harian();
		$kantor 			= $this->Kantor_Model->getKantorDetail();
		$data = array(
			'title'			=> 'Cetak Transaksi Harian',
			'dataUser'		=> $this->session->userdata(),
			'dataHarian' 	=> $allHarian,
			'kantor'		=> $kantor
		);

		foreach ($allHarian as $val) {
			// ambil detail perhari nya
			$detailHarian = $this->ReportModel->fetchDetailTransaksi($val->tgl_kirim);
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
		$this->load->view('admin/report/cetakharian', $data);
	}

	public function cetakbulanan()
	{
		$allBulanan			= $this->ReportModel->fetch_transaksi_bulanan();
		$kantor 			= $this->Kantor_Model->getKantorDetail();
		$data = array(
			'title'			=> 'Cetak Transaksi Bulanan',
			'dataUser'		=> $this->session->userdata(),
			'dataBulanan' 	=> $allBulanan,
			'kantor'		=> $kantor
		);

		foreach ($allBulanan as $val) {
			$detailBulanan	= $this->ReportModel->fetchDetailTransaksiBulanan($val->bulan_kirim);
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
		$this->load->view('admin/report/cetakbulanan', $data);
	}
}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */