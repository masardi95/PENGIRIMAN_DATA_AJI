<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Pesanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    require APPPATH.'libraries/phpmailer/src/Exception.php';
      	require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
      	require APPPATH.'libraries/phpmailer/src/SMTP.php';
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('VendorKantorModel');
	    $this->load->model('VendorPesananModel');
	    $this->load->model('Kantor_Model');
	    $this->load->model('TransaksiModel');

	    if(empty($this->session->userdata('authenticated'))) {
	      redirect('auth/logout');
	    }
	}


	// tampilan dashboard vendor
	public function index()
	{
		$data = array(
			'title'					=> 'Dashboard Vendor',
			'dataUser'				=> $this->session->userdata(),
		);
		// echo json_encode($data);
		$this->load->view('vendor/dashboard', $data);
	}

	// tampilan awal pesanan yang masuk dari kantor ke vendor
	public function in()
	{
		// $idUser = $this->session->userdata('idUser');
		// $vendor = $this->VendorKantorModel->getKantorByUser($idUser);
		$data = array(
			'title'			=> 'Kantor Vendor',
			'dataUser'		=> $this->session->userdata(),
		);
		// echo json_encode($data);
		$this->load->view('vendor/pesanan/in', $data);
	}

	// tampilan pesanan yang sudah di proses oleh vendor
	public function onprog()
	{
		$data = array(
			'title'			=> 'Sedang Proses',
			'dataUser'		=> $this->session->userdata(),
		);
		// echo json_encode($data);
		$this->load->view('vendor/pesanan/onprog', $data);
	}


	// tampilan pesanan yang sudah di selesai
	public function done()
	{
		$data = array(
			'title'			=> 'Transaksi Selesai',
			'dataUser'		=> $this->session->userdata(),
		);
		// echo json_encode($data);
		$this->load->view('vendor/pesanan/done', $data);
	}

	// cari pesanan yang masuk dari database
	public function ajaxPesananMasuk()
	{
		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);
		$data = array(
			'pesananMasuk' => $this->VendorPesananModel->fetchPesananMasuk($vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/pesanan/ajaxrpesananmasuk', $data);
	}

	// cari pesanan yang sudah di proses oleh vendor dari database
	public function ajaxonprog()
	{
		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);
		$data = array(
			'pesananMasuk' => $this->VendorPesananModel->fetchPesananOnProg($vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/pesanan/ajaxonprog', $data);
	}

	// cari pesanan yang sudah selesai
	public function ajaxpesanandone()
	{
		$idUser = $this->session->userdata('idUser');
		$vendor = $this->VendorKantorModel->getKantorByUser($idUser);
		$data = array(
			'pesananMasuk' => $this->VendorPesananModel->fetchPesananDone($vendor->id_vendor)
		);
		// echo json_encode($data);
		$this->load->view('vendor/pesanan/ajaxdone', $data);
	}


	// proses transaksi penerimaan cetak dari kantor
	public function prosestransaksi($idTransaksi)
	{
		$up = array(
			'status' 			=> 'Diterima Vendor', 
			'id_user_vendor' 	=> $this->session->userdata('idUser'), 
			'tgl_proses' 		=> date("Y-m-d H:m:s"), 
		);	
		
		if ($this->VendorPesananModel->updatePesanan($idTransaksi, $up)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil update Pemesanan', 
			);

			// kirim notif ke kantor pemesan
			$kantor = $this->Kantor_Model->getKantorDetail();
			$detailTransaksi = $this->TransaksiModel->getTransaksiById($idTransaksi);

			$this->kirimEmail(
				$kantor->email_kantor,
				$up['status'],
				'Pemesanan pada nomor Transaksi <b>'.$detailTransaksi->no_transaksi.'</b> Telah '.$up['status'].'.<br><br>'.
				'Terimakasih<br>'.$this->session->userdata('namaUser')
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal update Pemesanan', 
			);
		}
		echo json_encode($data);
	}

	public function declineTransaksi($idTransaksi)
	{
		$up = array(
			'status' 			=> 'Ditolak Vendor'
		);	
		
		if ($this->VendorPesananModel->updatePesanan($idTransaksi, $up)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil update Pemesanan', 
			);

			// kirim notif ke kantor pemesan
			$kantor = $this->Kantor_Model->getKantorDetail();
			$detailTransaksi = $this->TransaksiModel->getTransaksiById($idTransaksi);

			$this->kirimEmail(
				$kantor->email_kantor,
				$up['status'],
				'Pemesanan pada nomor Transaksi <b>'.$detailTransaksi->no_transaksi.'</b> Telah '.$up['status'].'.<br><br>'.
				'Terimakasih<br>'.$this->session->userdata('namaUser')
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal update Pemesanan', 
			);
		}
		echo json_encode($data);
	}

	// set status selesai cetak, dan kirim notifikasi ke kantor via email
	public function settunggupembayaran($idTransaksi)
	{
		$up = array(
			'status' 			=> 'Tunggu Pembayaran', 
			'id_user_vendor' 	=> $this->session->userdata('idUser'), 
			'tgl_selesai' 		=> date("Y-m-d H:m:s"), 
		);	
		
		if ($this->VendorPesananModel->updatePesanan($idTransaksi, $up)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil update Pemesanan', 
			);

			// kirim notif ke kantor pemesan
			$kantor = $this->Kantor_Model->getKantorDetail();
			$detailTransaksi = $this->TransaksiModel->getTransaksiById($idTransaksi);

			$this->kirimEmail(
				$kantor->email_kantor,
				$up['status'],
				'Pemesanan pada nomor Transaksi <b>'.$detailTransaksi->no_transaksi.'</b> Telah '.$up['status'].'.<br><br>'.
				'Terimakasih<br>'.$this->session->userdata('namaUser')
			);
			
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal update Pemesanan', 
			);
		}
		echo json_encode($data);
	}

	// selesaikan proses transaksi, setelah bukti pembayaran di kirim
	public function selesaikan($idTransaksi)
	{
		$up = array(
			'status' 			=> 'Selesai', 
			'id_user_vendor' 	=> $this->session->userdata('idUser'), 
			'tgl_acc' 			=> date("Y-m-d H:m:s"), 
		);	
		
		if ($this->VendorPesananModel->updatePesanan($idTransaksi, $up)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil update Pemesanan', 
			);

			// kirim notif ke kantor pemesan
			$kantor = $this->Kantor_Model->getKantorDetail();
			$detailTransaksi = $this->TransaksiModel->getTransaksiById($idTransaksi);

			$this->kirimEmail(
				$kantor->email_kantor,
				$up['status'],
				'Pemesanan pada nomor Transaksi <b>'.$detailTransaksi->no_transaksi.'</b> Telah '.$up['status'].'.<br><br>'.
				'Terimakasih<br>'.$this->session->userdata('namaUser')
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal update Pemesanan', 
			);
		}
		echo json_encode($data);
	}

	// eksekusi email dari function2 diatas
 	public function kirimEmail($emailTujuan, $subject, $pesan)
 	{
 		// PHPMailer object
	     $response = false;
	     $mail = new PHPMailer();
	     

	      // SMTP configuration
	      $mail->isSMTP();
	      $mail->Host     = 'masardidev.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
	      $mail->SMTPAuth = true;
	      $mail->Username = 'admin@masardidev.com'; // user email
	      $mail->Password = '{1234plokijuh}'; // password email
	      $mail->SMTPSecure = 'ssl';
	      $mail->Port     = 465;

	      $mail->setFrom('admin@masardidev.com', ''); // user email
	      // $mail->addReplyTo('admin@masardidev.com', ''); //user email

	      // Add a recipient
	      $mail->addAddress($emailTujuan); //email tujuan pengiriman email

	      // Email subject
	      $mail->Subject = $subject; //subject email

	      // Set email format to HTML
	      $mail->isHTML(true);

	      // Email body content
	      $mail->Body = $pesan;

	      // Send email
	      if(!$mail->send()){
	          // echo 'Message could not be sent.';
	          // echo 'Mailer Error: ' . $mail->ErrorInfo;
	      }else{
	          // echo 'Message has been sent';
	      }
 	}
}

/* End of file Pesanan.php */
/* Location: ./application/controllers/vendor/Pesanan.php */