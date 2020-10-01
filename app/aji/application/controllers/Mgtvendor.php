<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgtvendor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form','url'));
	    $this->load->library('form_validation');
	    $this->load->model('Mgtvendor_Model');
	    if(empty($this->session->userdata('authenticated')) || ($this->session->userdata('isVendor'))) {
	      redirect('auth/logout');
	    }
	}
	public function index()
	{
		$data = array(
			'title'					=> 'Data Vendor',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/mgtvendor/mgtvendor', $data);
	}

	public function doData()
	{
		$idVendor	= $this->input->post('idVendor');
		$email		= $this->input->post('emailVendor');

		$isi = array(
			'nama_vendor' 		=> $this->input->post('namaVendor'), 
			'email_vendor' 		=> $this->input->post('emailVendor'), 
			'alamat_vendor' 	=> $this->input->post('alamatVendor'), 
		);

		$cekEmail = $this->Mgtvendor_Model->cekEmailVendor($email);

		if (empty($idVendor)) {
			// berarti insert Vendor
			if (empty($cekEmail)) {
				if ($this->Mgtvendor_Model->isiVendor($isi) > 0) {
					$data = array(
						'result' => true, 
						'message' => 'Berhasil insert Vendor', 
					);
				}else{
					$data = array(
						'result' => false, 
						'message' => 'Gagal insert Vendor', 
					);
				}
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal insert Vendor, email telah dipakai', 
				);
			}
			
		}else{
			// berarti update Vendor
			if (empty($cekEmail) || $cekEmail->id_vendor == $idVendor) {
				if ($this->Mgtvendor_Model->updateVendor($idVendor, $isi)) {
					$data = array(
						'result' => true, 
						'message' => 'Berhasil update Vendor', 
					);
				}else{
					$data = array(
						'result' => false, 
						'message' => 'Gagal update Vendor', 
					);
				}
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal update Vendor, email telah dipakai', 
				);
			}
		}

		echo json_encode($data);
	}

	public function getVendorById($idVendor)
	{
		echo json_encode($this->Mgtvendor_Model->getVendorById($idVendor));		
	}

	public function hapusVendorById($id)
	{
		if ($this->Mgtvendor_Model->hapusVendorById($id)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil hapus Vendor', 
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal hapus Vendor', 
			);
		}
		echo json_encode($data);
	}

	public function aktifkanvendorbyid($id)
	{
		if ($this->Mgtvendor_Model->aktifkanvendorbyid($id)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil Mengaktifkan Vendor', 
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal Mengaktifkan Vendor', 
			);
		}
		echo json_encode($data);
	}

	public function ajaxFetchAllVendor()
	{
		$data = array('dataVendor' => $this->Mgtvendor_Model->ajaxFetchAllVendor());
		// echo json_encode($data);
		$this->load->view('admin/mgtvendor/ajax_vendor', $data);
	}

	public function fetchAllVendorAktive()
	{
		$data = array('dataVendor' => $this->Mgtvendor_Model->fetchAllVendorAktive());
		echo json_encode($data);
	}





	/*******************************************************************************************************************/
	/************************************************* USER VENDOR *****************************************************/
	/*******************************************************************************************************************/

	public function userVendor()
	{
		$data = array(
			'title'					=> 'User Vendor',
			'dataUser'				=> $this->session->userdata(),
		);

		// echo json_encode($data);
		$this->load->view('admin/mgtvendor/mgtuservendor', $data);
	}

	public function getUserVendorById($idUser)
	{
		echo json_encode($this->Mgtvendor_Model->getUserVendorById($idUser));		
	}

	public function ajaxFetchAllUserVendor()
	{
		$data = array('dataUserVendor' => $this->Mgtvendor_Model->ajaxFetchAllUserVendor());
		// echo json_encode($data);
		$this->load->view('admin/mgtvendor/ajax_user_vendor', $data);
	}

	public function doDataUser()
	{
		$idUserVendor	= $this->input->post('idUserVendor');
		$username		= $this->input->post('username');

		$isi = array(
			'password' 				=> md5($this->input->post('pass')), 
			'username' 				=> $this->input->post('username'), 
			'id_vendor' 			=> $this->input->post('vendor'), 
			'nama_user_vendor' 		=> $this->input->post('namaUser'), 
		);

		$cekUsername = $this->Mgtvendor_Model->cekUsername($username);

		if (empty($idUserVendor)) {
			// berarti insert Vendor
			if (empty($cekUsername)) {
				if ($this->Mgtvendor_Model->isiUserVendor($isi) > 0) {
					$data = array(
						'result' => true, 
						'message' => 'Berhasil insert User Vendor', 
					);
				}else{
					$data = array(
						'result' => false, 
						'message' => 'Gagal insert User Vendor', 
					);
				}
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal insert User Vendor, username telah dipakai', 
				);
			}
			
		}else{
			// berarti update Vendor
			if (empty($cekUsername) || $cekUsername->id_user_vendor == $idUserVendor) {
				if ($this->Mgtvendor_Model->updateUserVendor($idUserVendor, $isi)) {
					$data = array(
						'result' => true, 
						'message' => 'Berhasil update User Vendor', 
					);
				}else{
					$data = array(
						'result' => false, 
						'message' => 'Gagal update User Vendor', 
					);
				}
			}else{
				$data = array(
					'result' => false, 
					'message' => 'Gagal update User Vendor, username telah dipakai', 
				);
			}
		}

		echo json_encode($data);
	}

	public function hapusUserVendorById($id)
	{
		if ($this->Mgtvendor_Model->hapusUserVendorById($id)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil hapus User Vendor', 
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal hapus User Vendor', 
			);
		}
		echo json_encode($data);
	}

	public function aktifkanuservendorbyid($id)
	{
		if ($this->Mgtvendor_Model->aktifkanUserVendorById($id)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil Mengaktifkan User Vendor', 
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal Mengaktifkan User Vendor', 
			);
		}
		echo json_encode($data);
	}

	public function resetpwuservendor($id)
	{
		if ($this->Mgtvendor_Model->resetPwUserVendorById($id)) {
			$data = array(
				'result' => true, 
				'message' => 'Berhasil Reset Password User Vendor', 
			);
		}else{
			$data = array(
				'result' => false, 
				'message' => 'Gagal Reset Password User Vendor', 
			);
		}
		echo json_encode($data);
	}


	/***********************************************************************************/
	/******************************** TRANSAKSI KIRIM **********************************/
	/***********************************************************************************/

	public function fetchProductVendorById($id)
	{
		$data = array('dataProduct' => $this->Mgtvendor_Model->fetchProductVendorById($id));
		echo json_encode($data);
	}
}

/* End of file Mgtvendor.php */
/* Location: ./application/controllers/Mgtvendor.php */