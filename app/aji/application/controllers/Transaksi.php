<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    require APPPATH.'libraries/phpmailer/src/Exception.php';
      	require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
      	require APPPATH.'libraries/phpmailer/src/SMTP.php';
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('Kantor_Model');
	    $this->load->model('TransaksiModel');
	    $this->load->model('Mgtvendor_Model');
	    if(empty($this->session->userdata('authenticated')) || ($this->session->userdata('isVendor'))) {
	      redirect('auth/logout');
    	}
	}
	
	public function index()
	{
		// $data = array(
		// 	'title'					=> 'Data Transaksi',
		// 	'dataUser'				=> $this->session->userdata(),
		// );

		// echo json_encode($data);
		// $this->load->view('admin/transaksi/transaksi', $data);
	}

	/*****************************************************************************************************/
	/********************************************** KIRIM ************************************************/
	/*****************************************************************************************************/

	// tampilan kirim file
	public function kirim()
	{
		$data = array(
			'title'					=> 'Kiriman Transaksi',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/transaksi/kirim', $data);
	}

	// insert transaksi barang baru dari kantor ke vendor
	public function doKirim()
	{
		$error = array();
		$idTransaksi	= $this->input->post('idTransaksi');
		$idVendor 		= $this->input->post('emailVendor');
		$isi = array(
			// 'id_kantor' 		=> $this->input->post('idKantor'), 
			'id_user_kantor'	=> $this->session->userdata('idUser'), 
			'id_vendor' 		=> $idVendor, 
			'id_product' 		=> $this->input->post('prodVendor'), 
			'jumlah' 			=> $this->input->post('jumCetak'),
			'keterangan'	 	=> $this->input->post('ket'),
			'link_external'	 	=> $this->input->post('linkExternal'),
			'status'			=> 'Dikirim'
		);

		// konfig file upload
		$conFile['upload_path'] 		= './assets/image/filekirim/';
		$conFile['allowed_types'] 		= '*';
		$conFile['max_size']  			= '5000';
		$conFile['file_name']			= $this->session->userdata('username'). substr(rand(), 0,5). date("dmY");
		$cek = $this->load->library('upload', $conFile);

		if ($_FILES['fileMentah']['name']!=null) {
			if ( ! $this->upload->do_upload('fileMentah')){
				$data = 'File => '.$this->upload->display_errors();
				echo $data;
			}
			else{
				$isi['nama_file'] = $this->upload->data('file_name');
			}
		}

		$conGambar['allowed_types'] 	= 'gif|jpg|jpeg|png';
		$conGambar['max_size']  		= '1024';
		$conGambar['file_name']			= $this->session->userdata('username'). substr(rand(), 0,5). date("dmY");
		$cek = $this->load->library('upload', $conGambar);
		// cek keberadaan logo
		if ($_FILES['gambarFile']['name']!=null) {
			if ( ! $this->upload->do_upload('gambarFile')){
				$data = 'Foto => '.$this->upload->display_errors();
				echo $data;
			}
			else{
				$isi['nama_gambar'] = $this->upload->data('file_name');
			}
		}
		// ambil harga produk
		$product = $this->TransaksiModel->getProductById($this->input->post('prodVendor'));
		$isi['harga'] = $product->harga;

		if ($idTransaksi == '') {
			// isi ke transaksi
			$isi['no_transaksi'] = $this->session->userdata('username').date("dmYhisa");
			$data = array();
			$insert 		= $this->TransaksiModel->insertTransaksiKantor($isi);
			$detailVendor	= $this->Mgtvendor_Model->getVendorById($idVendor);
			if ($insert > 0) {
				$data = array(
					'result' => true, 
					'message' => 'Berhasil Insert Transaksi', 
				);

				// kirim ke email vendor  .......................
				// kirim dengan file gambar
				if (!empty($isi['nama_file'])) {
					$this->kirimEmail(
						$detailVendor->email_vendor,
						'Order "'.$isi['keterangan'].'" dengan nomor transaksi <b>'.$isi['no_transaksi'].'</b>, <br>'.
						'<a href="'. base_url('assets/image/filekirim/').$isi['nama_gambar'].'">Link Gambar</a>, <br>'.
						'<a href="'. base_url('assets/image/filekirim/').$isi['nama_file'].'">Link File</a>, <br>'.
						'<br><br>'.
						'Terimakasih <br>'.
						''.$this->session->userdata('namaUser'),
						'Order Baru'
					);
				}else{
					// kirim dengan link external
					$this->kirimEmail(
						$detailVendor->email_vendor,
						'Order "'.$isi['keterangan'].'" dengan nomor transaksi <b>'.$isi['no_transaksi'].'</b>, <br>'.
						'<a href="'. base_url('assets/image/filekirim/').$isi['nama_gambar'].'">Link Gambar</a>, <br>'.
						'<a href="'. $isi['link_external'].'">Link File</a>, <br>'.
						'<br><br>'.
						'Terimakasih <br>'.
						''.$this->session->userdata('namaUser'),
						'Order Baru'
					);
				}
				redirect('transaksi/kirim');
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal Insert Transaksi', 
				);
			}
		} else {
			// update transaksi
			$data = array();
			if ($this->TransaksiModel->updateTransaksi($isi, $idTransaksi)) {
				$data = array(
					'result' => true, 
					'message' => 'Berhasil Update Transaksi', 
				);
				redirect('transaksi/kirim');
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal Update Transaksi', 
				);
			}
		}
		echo json_encode($isi);
	}

	// ambil transaksi berdasarkan id nya
	public function getTransaksiById($id)
	{
		echo json_encode($this->TransaksiModel->getTransaksiById($id));
	}

	// tampilan design sedang dalam proses vendor
	public function onprog()
	{
		$data = array(
			'title'					=> 'Transaksi Progres',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/transaksi/onprog', $data);
	}

	// tampilan transaksi sudah selesai
	public function done()
	{
		$data = array(
			'title'					=> 'Transaksi Selesai',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/transaksi/transaksidone', $data);
	}

	// ambil semua transaksi selesai dari database
	public function fetchAllTransaksiSelesai()
	{
		$data = array('dataTransaksi' => $this->TransaksiModel->fetchAllTransaksiSelesai() );
		// echo json_encode($data);
		$this->load->view('admin/transaksi/ajax_load_transaksi_done', $data);
	}


	// ambil semua transaksi belum selesai dari database
	public function fetchAllTransaksiBelumSelesai()
	{
		$data = array('dataTransaksi' => $this->TransaksiModel->fetchAllTransaksiBelumProgres() );
		// echo json_encode($data);
		$this->load->view('admin/transaksi/ajax_load_transaksi', $data);
	}

	// ambil semua transaksi yang sedang diproses vendor dari database
	public function fetchAllProgTransaksi()
	{
		$data = array('dataTransaksi' => $this->TransaksiModel->fetchAllProgTransaksi() );
		// echo json_encode($data);
		$this->load->view('admin/transaksi/ajax_load_transaksi_progres', $data);
	}

	// upload bukti pembayaran
	public function upBukti()
	{
		$idTransaksi = $this->input->post('idTransaksi');
		$isi = array(
			'status' 			=> 'Menunggu proses cek bukti pembayaran, oleh vendor',
			'tgl_pelunasan' 	=>  date("Y-m-d H:m:s"),
		);
		// konfig file upload
		$conFile['upload_path'] 		= './assets/image/bukti/';
		$conFile['allowed_types'] 		= '*';
		$conFile['max_size']  			= '2048';
		$conFile['file_name']			= 'tf~'.$this->session->userdata('username'). substr(rand(), 0,5). date("dmY");
		$cek = $this->load->library('upload', $conFile);

		if ($_FILES['gambarBukti']['name']!=null) {
			if ( ! $this->upload->do_upload('gambarBukti')){
				$data = 'File => '.$this->upload->display_errors();
				echo $data;
			}
			else{
				$isi['bukti_pembayaran'] = $this->upload->data('file_name');
			}
		}

		if ($this->TransaksiModel->updateTransaksi($isi, $idTransaksi)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil Insert bukti', 
			);
			
			// kirim ke notifikasi bukti pembayaran
			$detailTransaksi 	= $this->TransaksiModel->getTransaksiById($idTransaksi);
			$detailVendor	= $this->Mgtvendor_Model->getVendorById($detailTransaksi->id_vendor);
			$this->kirimEmail(
				$detailVendor->email_vendor,
				'Nomor Transaksi  "'.$detailTransaksi->no_transaksi.'" Telah dibayarkan, <br>'.
				'<a href="'. base_url('assets/image/bukti/').$isi['bukti_pembayaran'].'">Link File</a>, <br>'.
				'<br><br>'.
				'Terimakasih <br>'.
				''.$this->session->userdata('namaUser'),
				'Pembayaran Order'
			);
			redirect('transaksi/onprog');
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal Insert bukti', 
			);
		}
		echo json_encode($isi);
	}

	public function cekEmail()
	{
		$this->kirimEmail(
			'gpoex.mas@gmail.com',
			'Nomor Transaksi '.
			'Terimakasih <br>'.
			''.$this->session->userdata('namaUser'),
			'Pembayaran Order'
		);
	}


	// proses kirim email ke vendor
 	public function kirimEmail($emailTujuan, $pesan, $subject)
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
	      $mail->Subject = $subject.' '.date('Y-m-d H:m:s'); //subject email

	      // Set email format to HTML
	      $mail->isHTML(true);

	      // Email body content
	      $mail->Body = $pesan;

	      // Send email
	      if(!$mail->send()){
	          echo 'Message could not be sent.';
	          echo 'Mailer Error: ' . $mail->ErrorInfo;
	      }else{
	          echo 'Message has been sent';
	      }
 	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */